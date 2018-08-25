<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Log;

class BackupCSVController extends Controller {

	/**
	 * DB table name
	 *
	 * @var string
	 */
	private $table;
	private $success;
	private $error = '导入失败,请仔细检查格式！';
	private $filename;
	/**
	 * DB field that to be hashed, most likely a password field.
	 * If your password has a different name, please overload this
	 * variable from our seeder class.
	 *
	 * @var string
	 */

	private $hashable = 'password';

	/**
	 * An SQL INSERT query will execute every time this number of rows
	 * are read from the CSV. Without this, large INSERTS will silently
	 * fail.
	 *
	 * @var int
	 */
	private $insert_chunk_size = 50;

	/**
	 * CSV delimiter (defaults to ,)
	 *
	 * @var string
	 */
	private $csv_delimiter = ',';

	/**
	 * Number of rows to skip at the start of the CSV
	 *
	 * @var int
	 */
	private $offset_rows = 0;

	/**
	 * The mapping of CSV to DB column. If not specified manually, the first
	 * row (after offset_rows) of your CSV will be read as your DB columns.
	 *
	 * IE to read the first, third and fourth columns of your CSV only, use:
	 * array(
	 *   0 => id,
	 *   2 => name,
	 *   3 => description,
	 * )
	 *
	 * @var array
	 */
	private $mapping = [];

	// $this->table = 'users';
	// 	$this->csv_delimiter = '|';
	// 	$this->filename = base_path().'/database/seeds/csvs/your_csv.csv';
	// 	$this->offset_rows = 1;
	// 	$this->mapping = [
	// 	    0 => 'first_name',
	// 	    1 => 'last_name',
	// 	    2 => 'password',
	// 	];
	// 	$this->should_trim = true;

	public function index() {
		// $schema = env('DB_DATABASE');
		// // $sql = "select t.column_name as '字段名',t.data_type as '类型',t.character_maximum_length as '长度限制',t.column_key as '特征',t.column_comment as '说明',t.column_comment as '名词' from information_schema.columns t where TABLE_SCHEMA='{$schema}' and TABLE_NAME= '{$info->getTable()}'";
		// $sql = 'show tables;';
		// $table = \DB::select($sql);
		// $tables = [];
		// // ->transform(function ($v, $k) use ($schema) {
		// // 	return $v->{'Tables_in_' . $schema};
		// // });
		// $ignoreTables = ['users', 'roles', 'role_has_permissions', 'permissions', 'model_has_permissions', 'model_has_roles', 'mineralright', 'oauth_access_tokens', 'oauth_auth_codes', 'oauth_clients', 'oauth_personal_access_clients', 'oauth_refresh_tokens'];
		// foreach ($table as $key => $value) {
		// 	if (!in_array($value->{'Tables_in_' . $schema}, $ignoreTables)) {
		// 		$tables[] = $value->{'Tables_in_' . $schema};
		// 	}
		// }
		// 应该还是表名对汉字名合适一点
		// dd($tables);
		// $table = '';
		$tables = config('tables');
		// 在config.tables里面修改哪些可以上传
		// 在database.正确格式 csv有相关格式
		foreach ($tables as $groupKey => $groupValue) {
			foreach ($groupValue as $key => $value) {
				$tables[$groupKey][$key] = $value['title'] . ' - ' . $key;
			}
		}
		return view('admin.backup.csv', compact('tables'));
	}
	public function import(Request $request) {
		if (!$request->table) {
			return redirect()->route('admin.csv.index')->with('error', '请选择需要导入的表');
		}
		if (!$request->file) {
			return redirect()->route('admin.csv.index')->with('error', '请上传需要导入的文件');
		}
		try {
			$this->table = $request->table;
			$this->filename = $request->file;
			$this->seedFromCSV();
			if ($this->success > 0) {
				return redirect()->route('admin.csv.index')->with('success', $request->table . ' 数据插入成功！');
			} else {
				return redirect()->route('admin.csv.index')->with('error', $this->error);
			}
		} catch (\Exception $e) {
			dd($e->getMessage());
		}
	}
	/**
	 * Strip UTF-8 BOM characters from the start of a string
	 *
	 * @param  string $text
	 * @return string       String with BOM stripped
	 */
	private function stripUtf8Bom($text) {
		$bom = pack('H*', 'EFBBBF');
		$text = preg_replace("/^$bom/", '', $text);

		return $text;
	}

	/**
	 * Opens a CSV file and returns it as a resource
	 *
	 * @param $filename
	 * @return FALSE|resource
	 */
	private function openCSV() {
		if (!file_exists($this->filename) || !is_readable($this->filename)) {
			Log::error("CSV insert failed: CSV " . $this->filename . " does not exist or is not readable.");
			return FALSE;
		}

		// check if file is gzipped
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$file_mime_type = finfo_file($finfo, $this->filename);
		finfo_close($finfo);
		$gzipped = strcmp($file_mime_type, "application/x-gzip") == 0;

		$handle = $gzipped ? gzopen($this->filename, 'r') : fopen($this->filename, 'r');

		return $handle;
	}

	/**
	 * Collect data from a given CSV file and return as array
	 *
	 * @param string $filename
	 * @param string $this->csv_delimiter
	 * @return array|bool
	 */
	private function seedFromCSV() {
		$this->success = 0;
		$handle = $this->openCSV($this->filename);

		// CSV doesn't exist or couldn't be read from.
		if ($handle === FALSE) {
			return [];
		}

		$header = NULL;
		$row_count = 0;
		$data = [];
		$mapping = $this->mapping ?: [];
		$offset = $this->offset_rows;
		while (($row = fgetcsv($handle, 0, $this->csv_delimiter)) !== FALSE) {
			// Offset the specified number of rows

			while ($offset > 0) {
				$offset--;
				continue 2;
			}

			// No mapping specified - grab the first CSV row and use it
			if (!$mapping) {
				$mapping = $row;
				$mapping[0] = $this->stripUtf8Bom($mapping[0]);

				// skip csv columns that don't exist in the database
				foreach ($mapping as $index => $fieldname) {
					if (!DB::getSchemaBuilder()->hasColumn($this->table, $fieldname)) {
						array_pull($mapping, $index);
					}
				}
			} else {
				$row = $this->readRow($row, $mapping);
				// Log::error(json_encode($row));
				// insert only non-empty rows from the csv file
				if (!$row) {
					continue;
				}
				if (!$row['id']) {
					continue;
				}
				$data[$row_count] = $row;

				// Chunk size reached, insert
				if (++$row_count == $this->insert_chunk_size) {
					$this->insert($data);
					$row_count = 0;
					// clear the data array explicitly when it was inserted so
					// that nothing is left, otherwise a leftover scenario can
					// cause duplicate inserts
					$data = array();
				}
			}
		}

		// Insert any leftover rows
		//check if the data array explicitly if there are any values left to be inserted, if insert them
		if (count($data)) {
			$this->insert($data);
		}

		fclose($handle);
		// Log::error(json_encode($data));
		return $data;
	}

	/**
	 * Read a CSV row into a DB insertable array
	 *
	 * @param array $row        List of CSV columns
	 * @param array $mapping    Array of csvCol => dbCol
	 * @return array
	 */
	private function readRow(array $row, array $mapping) {
		$row_values = [];

		foreach ($mapping as $csvCol => $dbCol) {
			if (!isset($row[$csvCol]) || $row[$csvCol] === '') {
				$row_values[$dbCol] = NULL;
			} else {
				$row_values[$dbCol] = $row[$csvCol];
			}
		}

		if ($this->hashable && isset($row_values[$this->hashable])) {
			$row_values[$this->hashable] = Hash::make($row_values[$this->hashable]);
		}
		$row_values['updated_at'] = now();
		$row_values['created_at'] = now();

		return $row_values;
	}

	/**
	 * Seed a given set of data to the DB
	 *
	 * @param array $seedData
	 * @return bool   TRUE on $parks = parks('select'); else FALSE
	 */
	private function insert(array $seedData) {
		try {
			// Log::error(json_encode($seedData));
			DB::table($this->table)->insert($seedData);
			$this->success++;
		} catch (\Exception $e) {
			if (str_contains($e->getMessage(), 'Duplicate')) {
				$this->error = 'ID冲突，请确定数据库不存在此数据!';
			} elseif (str_contains($e->getMessage(), 'cannot be null')) {
				$this->error = '关键数据不能留空(或需删除空白行)，请仔细检查!' . $e->getMessage();
			} elseif (str_contains($e->getMessage(), 'Data too long')) {
				$this->error = '字段数据超长:' . $e->getMessage();
			} elseif (str_contains($e->getMessage(), '1366 Incorrect')) {
				$this->error = '字段格式错误:' . $e->getMessage();
			} else {
				$this->error = $e->getMessage();
			}
			Log::error("CSV insert failed: " . $e->getMessage() . " - CSV " . $this->filename);
			return FALSE;
		}

		return TRUE;
	}
}
