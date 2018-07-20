@extends('admin.app')

@section('htmlheader_title')
活动管理
@endsection

@section('main-content')
@include('UEditor::head')
<div class="row">
  <div class="col-md-12">
    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">创建活动</h3>
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

        {!! Form::open(['route' => 'admin.event.store','files'=>true]) !!}

        <div class="form-group">
          {!! Form::label('title', '显示名称*') !!}
          {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('address', '活动地点*') !!}
          {!! Form::text('address', 'Gene', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('type', '活动类型*') !!}
          {!! Form::text('type', '常规活动', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('organization', '活动组织*') !!}
          {!! Form::text('organization', 'Gene - 校友会', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('limit', '报名人数限制*') !!}
          {!! Form::number('limit', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('date', '报名截止日期*') !!}
          {!! Form::text('date', null, ['class' => 'form-control js-datepicker','data-date-format'=>"yyyy-mm-dd"]) !!}
        </div>

        <div class="form-group">
          {!! Form::label('event_time', '活动时间*') !!}
          <div class="row">
            <div class="col-xs-6">
              {!! Form::text('event_start',null, ['class'=>'form-control js-datetimepicker date','data-format'=>'YYYY-MM-DD HH:mm','placeholder'=>'开始时间']) !!}
            </div>
            <div class="col-xs-6">
              {!! Form::text('event_end',null, ['class'=>'form-control js-datetimepicker date','data-format'=>'YYYY-MM-DD HH:mm','placeholder'=>'截止时间']) !!}
            </div>
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('cover_image', '活动封面*（正方形,建议大小 800x800）') !!}
          {!! Form::file('cover_image', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('content', '活动介绍*') !!}
          <script id="container" name="content" type="text/plain"></script>
        </div>

        <div class="form-group">
          <input type="hidden" name="approved" value="1">
          {!! Form::submit('提交', ['class' => 'btn btn-primary ']) !!}
        </div>

        {!! Form::close() !!}

      </div>
      <div class="block-footer"></div>
    </section>
  </div>
</div>
<script src="/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="/assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script>
  jQuery(function () {
    App.initHelpers(['datepicker','datetimepicker']);
  });
  jQuery('.js-datepicker').add('.input-daterange').datepicker({
    weekStart: 1,
    autoclose: true,
    todayHighlight: true,
    language: "zh-CN",
    defaultViewDate: {year:'2018','month':'9','day':'6'}
  });
</script>
<script type="text/javascript">
  var ue = UE.getEditor('container');
  ue.ready(function() {
    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
  });
</script>
@endsection