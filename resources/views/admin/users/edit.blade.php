@extends('admin.app')

@section('subject')
用户管理
@endsection
@section('location')
<li><a href="{{route('admin.users.index')}}">用户管理</a></li>
<li>编辑用户</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">用户编辑</h3>
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
        {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
        <div class="form-group">
          {!! Form::label('name', '登录名*') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password', '密码') !!}
          {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password_confirmation', '重复密码') !!}
          {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
        <hr>
        <div class="form-group">
          {!! Form::label('email', '电子邮箱') !!}
          {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          角色

          @foreach($roles as $role)
          @if($role->name !='course_admin' and $role->name !='wechat' and $role->name !='organizea_admin' and $role->name !='admin')
          <?php $checked = in_array($role->id, $user->roles()->pluck('id')->toArray());?>
          <div class="checkblock">
            <label>
              {!! Form::checkbox('role[]', $role->id, $checked) !!} {{ $role->name }}
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
