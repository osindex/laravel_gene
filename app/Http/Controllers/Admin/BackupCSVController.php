<?php

namespace App\Http\Controllers\Admin;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Http\Request;

class BackupCSVController extends CsvSeeder {
	public function __construct() {
		$this->table = 'your_table';
		$this->filename = base_path() . '/database/seeds/csvs/your_csv.csv';
	}
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
	public function run() {
		// Recommended when importing larger CSVs
		DB::disableQueryLog();
		// Uncomment the below to wipe the table clean before populating
		DB::table($this->table)->truncate();
		parent::run();
	}
	public function index() {
		$table = ['user', 'parkinfo'];
		return view('admin.backup.csv', compact('table'));
	}
	public function import(Request $request) {
		$this->table = $request->table;
		$this->filename = $request->filename;
		$this->run();
	}
}
