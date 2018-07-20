@extends('admin.app')

@section('htmlheader_title')
个人资料修改
@endsection

@section('main-content')
<div class="row">
  <div class="col-md-6">
    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">个人资料修改</h3>
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
        {!! Form::model($me, ['route' => ['me.update'], 'method' => 'PUT']) !!}
        <div class="form-group">
          {!! Form::label('login', '登录名*/不可更改') !!}
          {!! Form::text('login', null, ['class' => 'form-control','disabled']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password', '密码[若不更改密码请留空]') !!}
          {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password_confirmation', '重复密码[若不更改密码请留空]') !!}
          {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
        <hr>


        <div class="form-group">
          {!! Form::label('name', '姓名*') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('email', '电子邮箱') !!}
          {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> 提交</button>
        </div>
        {!! Form::close() !!}

      </div>
      <div class="block-footer"></div>
    </section>
  </div>

</div>
@endsection
