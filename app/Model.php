<?php
namespace App;
use App\FilterAndSorting;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel {
	use FilterAndSorting;
	public function scopePage($query, $req) {
		$reqs = $req->all();
		// $select = $req->getRequestParam('select') ?? '*';
		$pageSize = (int) ($reqs['per_page'] ?? 10);
		$page = (int) ($reqs['page'] ?? 1);
		$paginator = $query->paginate($pageSize, ['*'], 'page', $page);
		// $paginator->setPath($req->getServerParams()['request_uri']);
		$paginator->setPath('/' . $req->path())->appends($reqs);
		return $paginator;
	}
}