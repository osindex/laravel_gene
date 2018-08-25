@extends('admin.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">数据表导入</h3>
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

        {!! Form::open(['route' => 'admin.csv.post']) !!}
        <div class="form-group col-xs-12">
            {!! Form::label('table', '表名*') !!}
            {!! Form::select('table', $tables, old('table'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-xs-12">
          {!! Form::label('file', '文件*') !!}
          <div class="row">
          @component('admin.partials.file',['path'=>true,'fileName'=>'file','animated'=>'fx-img-zoom-in fx-img-rotate-l','title'=>'文件','desc'=>'建议大小 1M以内','defaultImg'=>'/assets/img/various/ecom_product3.png','width'=>200,'height'=>200])
          @endcomponent
          </div>
        </div>
        <div class="form-group col-xs-12">
            {!! Form::submit('提交', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="block-footer"></div>
  </section>
  </div>
</div>
@endsection
