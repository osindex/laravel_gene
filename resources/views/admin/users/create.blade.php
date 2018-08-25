@extends('admin.app')

@section('htmlheader_title')
用户管理
@endsection

@section('main-content')
<div class="row">
  <div class="col-md-6">
    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">添加用户</h3>
    </div>

    <div class="block-content">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(['route' => 'admin.users.store']) !!}
        <div class="form-group">
            {!! Form::label('email', 'EMAIL*') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', '姓名*') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', '密码*') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', '重复密码*') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            <label for="">角色</label>
            @foreach($roles as $role)
            @if($role->name !='course_admin' and $role->name !='wechat' and $role->name !='organizea_admin' and $role->name !='admin')
            <div class="checkblock">
                <label>
                    {!! Form::checkbox('role[]', $role->id) !!}
                    {{ $role->name=='admin'?'系统管理员(请勿随意添加)':$role->display_name }}
                </label>
            </div>
            @endif
            @endforeach
        </div>

        <div class="form-group">
            {!! Form::submit('提交', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    <div class="block-footer"></div>
</section>
</div>
</div>
@endsection