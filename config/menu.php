<?php
return [
	['class' => 'si si-speedometer', 'title' => '后台首页', 'url' => '/admin', 'children' => []],
	['class' => 'si si-rocket', 'title' => '前台', 'url' => '/', 'children' => []],
	['class' => 'nav-main-heading', 'title' => '系统管理', 'role' => 'super', 'url' => null, 'children' => []],
	['class' => 'si si-badge', 'title' => '用户管理', 'url' => null, 'children' => [
		['class' => 'fa fa-circle-o', 'title' => '用户列表', 'url' => '/admin/users', 'children' => []],
		// ['class'=>'si si-rocket','title'=>'用户列表','url'=>'/','children'=>[]],
	],
	],
	['class' => 'fa fa-hdd-o', 'title' => '数据管理', 'url' => null, 'children' => [
		['class' => 'fa fa-circle-o', 'title' => '整体备份', 'url' => '/admin/backup', 'children' => []],
		['class' => 'fa fa-circle-o', 'title' => '数据表导入', 'url' => '/admin/backupcsv', 'children' => []],
	],
	],
];