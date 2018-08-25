<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Artisan;
use Exception;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use League\Flysystem\Adapter\Local;
use Log;
use Response;
use Storage;

class BackupController extends Controller {
	public function index() {
		if (!count(config('backup.backup.destination.disks'))) {
			dd(trans('backup.no_disks_configured'));
		}
		$this->data['backups'] = [];
		foreach (config('backup.backup.destination.disks') as $disk_name) {
			$disk = Storage::disk($disk_name);
			$adapter = $disk->getDriver()->getAdapter();
			$files = $disk->allFiles();
			// make an array of backup files, with their filesize and creation date
			foreach ($files as $k => $f) {
				// only take the zip files into account
				if (substr($f, -4) == '.zip' && $disk->exists($f)) {
					$this->data['backups'][] = [
						'file_path' => $f,
						'file_name' => str_replace('backups/', '', $f),
						'file_size' => $disk->size($f),
						'last_modified' => $disk->lastModified($f),
						'disk' => $disk_name,
						'download' => ($adapter instanceof Local) ? true : false,
					];
				}
			}
		}
		// reverse the backups, so the newest one would be on top
		$this->data['backups'] = array_reverse($this->data['backups']);
		$this->data['title'] = 'Backups';
		return view('admin.backup.index', $this->data);
	}
	public function create() {
		try {
			ini_set('max_execution_time', config('backup.timeout', 60 * 5));
			// start the backup process
			$flags = config('backup.backup.backpack_flags', false);
			info('Calling backup:run ', $flags);
			if ($flags) {
				Artisan::call('backup:run', $flags);
			} else {
				Artisan::call('backup:run');
			}
			$output = Artisan::output();
			// log the results
			Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
			// return the results as a response to the ajax call
			echo $output;
		} catch (Exception $e) {
			Response::make($e->getMessage(), 500);
		}
		return 'success';
	}
	/**
	 * Downloads a backup zip file.
	 */
	public function download(Request $request) {
		$disk = Storage::disk($request->disk);
		$file_name = $request->file_name;
		$adapter = $disk->getDriver()->getAdapter();
		if ($adapter instanceof Local) {
			$storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();
			if ($disk->exists($file_name)) {
				return response()->download($storage_path . $file_name);
			} else {
				abort(404, trans('backup.backup_doesnt_exist'));
			}
		} else {
			abort(404, trans('backup.only_local_downloads_supported'));
		}
	}
	/**
	 * Deletes a backup file.
	 */
	public function delete(Request $request, $file_name) {
		$disk = Storage::disk($request->disk);
		if ($disk->exists($file_name)) {
			$disk->delete($file_name);
			return 'success';
		} else {
			abort(404, trans('backup.backup_doesnt_exist'));
		}
	}
}