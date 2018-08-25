@extends('admin.app')

@section('subject', "新增$table_zh")

@section('location')
<li><a href="{{ route("admin.{$table_en}.index") }}">列表_{{$table_zh}}</a></li>
<li>新增_{{$table_zh}}</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="block">

            <div class="block-content block-content-narrow">
                {{-- <form class="form-horizontal push-10-t" action="{{ route("admin.{$table_en}.update")}}" method="post"> --}}
                {!! Form::open(['route' => ["admin.{$table_en}.update", $item->id],'method'=>'PUT']) !!}
                       @if (isset($catagory))
                    <div class="form-group ">
                        {!! Form::label('catagory_id', '隶属*') !!}
                        {!! Form::select('catagory_id', $catagory, $item->catagory_id, ['class' => 'form-control']) !!}
                    </div>
                    @endif
                    {{ csrf_field() }}
                    @foreach($columns as $col)
                    <div class="form-group">
                        {!! Form::label($col[1], $col[0].($col[2]?'*':'')) !!}
                    @if (isset($col[6]) && $col[6])
                        <div class="row">
                        @component('admin.partials.file',['animated'=>'fx-img-rotate-l','title'=>'图片','desc'=>'请选择需要上传的图片','defaultImg'=>'/assets/img/various/ecom_product2.png','fileName'=>'img','img'=>$item->{$col[1]}])
                        @endcomponent
                        </div>
                    @elseif(isset($col[5]) && $col[5])
                        {!! Form::text($col[1], $item->{$col[1]}, ['class' => 'form-control js-datepicker-'.$col[1],'data-date-format'=>"yyyy-mm-dd"]) !!}
                        @push('htmlstart')
                        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css') }}">
                        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
                        @endpush
                        @push('htmlend')
                        <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
                        <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js') }}"></script>
                        <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker/moment.min.js') }}"</script>
                        <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
                        @endpush
                        @push('scripts')
                            App.initHelpers(['datepicker','datetimepicker']);
                            //.add('.input-daterange')
                            jQuery('.js-datepicker-{{$col[1]}}').datepicker({
                              weekStart: 1,
                              autoclose: true,
                              todayHighlight: true,
                              language: "zh-CN",
                              defaultViewDate: {year:'2018','month':'8','day':'8'}
                            });
                        @endpush
                    @elseif(isset($col[4]) && $col[4])
                        @component('admin.partials.editor',['label'=>$col[0],'content'=>$item->{$col[1]},'required'=>'true','name'=>$col[1]])
                        @endcomponent
                    @elseif($col[3])
                        {!! Form::textarea($col[1], $item->{$col[1]}, ['class' => 'form-control','rows'=>'2']) !!}
                    @else
                        {!! Form::text($col[1], $item->{$col[1]}, ['class' => 'form-control']) !!}
                    @endif
                    </div>
                    @endforeach
                    <div class="form-group">
                        {!! Form::submit('提交', ['class' => 'btn btn-primary']) !!}
                    </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection