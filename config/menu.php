<?php
return [
	['class' => 'si si-speedometer', 'title' => '后台首页', 'url' => '/admin', 'children' => []],
	['class' => 'si si-rocket', 'title' => '前台', 'url' => '/', 'children' => []],
	['class' => 'nav-main-heading', 'title' => '系统管理', 'role' => ['super', 'back'], 'url' => null, 'children' => []],
	['class' => 'si si-badge', 'title' => '用户管理', 'role' => ['super', 'back'], 'url' => null, 'children' => [
		['class' => 'fa fa-circle-o', 'title' => '用户列表', 'role' => ['super', 'back'], 'url' => '/admin/users', 'children' => []],
		// ['class'=>'si si-rocket','title'=>'用户列表','url'=>'/','children'=>[]],
	],
	],
	['class' => 'fa fa-hdd-o', 'title' => '数据管理', 'role' => ['super', 'back'], 'url' => null, 'children' => [
		['class' => 'fa fa-circle-o', 'title' => '整体备份', 'role' => ['super'], 'url' => '/admin/backup', 'children' => []],
		['class' => 'fa fa-circle-o', 'title' => '数据表导入', 'role' => ['super', 'back'], 'url' => '/admin/backupcsv', 'children' => []],
	],
	],
	// ['class' => 'nav-main-heading', 'title' => '数据维护', 'url' => null, 'children' => []],
	// ['class' => 'glyphicon glyphicon-leaf', 'title' => '公园数据', 'url' => '/admin/park_info', 'children' => [],
	// ],

	['class' => 'nav-main-heading', 'title' => '新闻设置', 'role' => ['super', 'back'], 'url' => null, 'children' => []],

	['class' => 'glyphicon glyphicon-plane', 'title' => '列表信息', 'url' => '/admin/news', 'role' => ['super', 'back'], 'children' => []],

	// ['class' => 'glyphicon glyphicon-tree-deciduous', 'title' => '日常办公', 'role' => ['super', 'back'], 'url' => null, 'children' => [
	// 	['class' => 'glyphicon glyphicon-scissors', 'title' => '游客统计', 'role' => ['super', 'back'], 'url' => '/admin/gueststat', 'children' => []],
	// 	['class' => 'fa fa-circle-o', 'title' => '财务统计', 'role' => ['super', 'back'], 'url' => '/admin/fincestat', 'children' => []],
	// 	['class' => 'fa fa-circle-o', 'title' => '新闻通讯', 'role' => ['super', 'back'], 'url' => '/admin/news', 'children' => []],
	// 	['class' => 'fa fa-circle-o', 'title' => '公园项目管理', 'role' => ['super', 'back'], 'url' => '/admin/parkoption', 'children' => []],
	// ]],
	/*['class' => 'nav-main-heading', 'title' => '日常办公', 'url' => null, 'children' => []],
		['class' => 'glyphicon glyphicon-scissors', 'title' => '游客统计', 'url' => null, 'children' => [
			['class' => 'fa fa-circle-o', 'title' => '游客统计列表', 'url'=> '/admin/gueststat','children' => []],
			['class' => 'fa fa-circle-o', 'title' => '游客统计图', 'url'=> '/admin/gueststat/chart','children' => []],
		]],
		['class' => 'glyphicon glyphicon-tree-deciduous', 'title' => '财务统计', 'url' => null, 'children' => [
			['class' => 'fa fa-circle-o', 'title' => '财务统计列表', 'url'=> '/admin/fincestat','children' => []],
			['class' => 'fa fa-circle-o', 'title' => '财务统计图', 'url'=> '/admin/fincestat/chart','children' => []],
	*/
];