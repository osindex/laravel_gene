

#视图
##[OneUi](http://demo.pixelcave.com/oneui/index.php)
## js
```
// 追加组件
@push('htmlend')
<script src="{{ asset('assets/js/plugins/flot/jquery.flot.pie.min.js') }}"></script>
@endpush
// Modal
@push('scripts')
	jQuery('#myModalId').modal('show');
	jQuery('#myModalId').modal('hide');
	jQuery('#myModalId').modal('toggle');
@endpush
```
##css
```
// popover
<button class="btn btn-success" data-toggle="popover" title="Bottom Popover" data-placement="bottom" data-content="This is example content. You can put a description or more info here." type="button">Show Popover</button>
```

##分页引入
```
// 后端渲染
@include('admin.partials.paginator', ['paginator' => $data])

// 前端渲染
// 引入css
assets/js/plugins/datatables/jquery.dataTables.min.css
// 引入js
assets/js/plugins/datatables/jquery.dataTables.min.js
assets/js/pages/base_tables_datatables.js

<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
	...
</table>
```
## 2018-07-18引入Form组件
```
https://segmentfault.com/a/1190000011580448

```

#Model&&Controller
## 2018-07-18引入FilterAndSorting
```
// Model中use
class XXX {
use FilterAndSorting;
}
// Controller
// 可以查看user@index
Modell::setFilterAndRelationsAndSort($request)->paginate($per_page);
//请求的结构
filter={"name":"admin"}
```

##引入API 概念
```
// 建立证书等信息
php artisan passport:install

// 在视图中使用 getToken() 获得token
// GET 请求 /api/user
// 请求头包含如下内容
Accept: application/json
Authorization: Bearer getToken()
// 得到当前用户信息 则使用成功
```

#Role
##执行
```
php artisan permission:create-role super

```
##以下备忘
```
//You can create a role or permission from a console with artisan commands.
php artisan permission:create-role writer
php artisan permission:create-permission "edit articles"
//When creating permissions and roles for specific guards you can specify the guard names as a second argument:
php artisan permission:create-role writer web
php artisan permission:create-permission "edit articles" web
```

##数据库备份
```
//my.cnf
//[mysqld]
innodb_buffer_pool_size = 1024M
```