@extends('admin.app')

@section('location')
<li>后台</li>
<li><a class="link-effect" href="">{{$location['name']}}</a></li>
@endsection
@section('content')
<div class="content bg-gray-lighter">
@php
$tables = config('tables');
$tableVari = 1;
@endphp
    @foreach($tables as $tableGroup => $table)
    <h2 class="content-heading">{{$tableGroup}}</h2>
    <div class="row">
        @foreach($table as $tKey =>$tVal)
        <div class="col-sm-6 col-lg-3">
        @switch($tVal['type'])
        @case(1)
            <a class="block block-link-hover3" href="{{$tVal['url'] ?? route('admin.'.$tKey.'.index')}}">
                <div class="block">
                    <div class="bg-image" style="background-image: url({{$tVal['background'] or '/assets/img/photos/photo'.$tableVari.'.jpg'}});">
                        <div class="bg-black-op">
                            <div class="block-content block-content-full text-center">
                                <h3 class="h4 text-uppercase text-white push-5-t push-5">{{$tVal['title']}}</h3>
                                <!-- <h4 class="h5 text-white-op push-20">公园概况</h4> -->
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row text-center">
                            {{$tVal['desc']}}
                        </div>
                    </div>
                </div>
            </a>
            @php
            $tableVari++;
            /*
            <!--
            <a class="block block-link-hover3" href="{{route('park.index')}}">
                <img class="img-responsive" src="assets/img/photos/photo23.jpg" alt="">
                <div class="block-content">
                    <h4 class="push-10">公园概况</h4>
                    <p>公园名称，级别，位置，类型，面积...</p>
                </div>
            </a> -->
            */
            @endphp
        </div>
        @break
        @case(2)
                <div class="bg-image" style="background-image: url({{$tVal['background'] or '/assets/img/photos/photo'.$tableVari.'.jpg'}});">
                    <div class="bg-black-op">
                        <div class="block block-themed block-transparent">
                            <div class="block-header">
                                <!-- <h3 class="block-title text-center">{{$tableGroup}}</h3> -->
                            </div>
                            <div class="block-content block-content-full text-center">
                                <h3 class="h1 font-w300 text-white">{{$tVal['title']}}</h3>
                            </div>
                            <div class="block-content block-content-full text-center">
                                <a class="text-white" href="{{$tVal['url'] ?? route('admin.'.$tKey.'.index')}}">
                                    {{$tVal['desc']}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $tableVari++;
                @endphp
            </div>
        @break
        @case(3)
                <a class="block block-link-hover3" href="{{$tVal['url'] ?? route('admin.'.$tKey.'.index')}}">
                    <img class="img-responsive" src="{{$tVal['background'] or '/assets/img/photos/photo'.$tableVari.'.jpg'}}" alt="">
                    <div class="block-content">
                        <h4 class="push-10">{{$tVal['title']}}</h4>
                        <p>{{$tVal['desc']}}</p>
                    </div>
                </a>
                @php
                $tableVari++;
                @endphp
            </div>
        @break
        @default
                <a class="block block-link-hover3" href="{{$tVal['url'] ?? route('admin.'.$tKey.'.index')}}">
                    <div class="block">
                        <div class="bg-image" style="background-image: url({{$tVal['background'] or '/assets/img/photos/photo'.$tableVari.'.jpg'}});">
                            <div class="bg-black-op">
                                <div class="block-content block-content-full text-center">
                                    <h3 class="h4 text-uppercase text-white push-5-t push-5">{{$tVal['title']}}</h3>
                                    <!-- <h4 class="h5 text-white-op push-20">公园概况</h4> -->
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row text-center">
                                {{$tVal['desc']}}
                            </div>
                        </div>
                    </div>
                </a>
                @php
                $tableVari++;
                @endphp
            </div>
        @endswitch
        @endforeach
    </div>
    @endforeach
</div>
@component('admin.partials.modal',['theme'=>'dark'])
    @slot('id')
        apps-modal
    @endslot
    @slot('title')
        测试Modal
    @endslot
    <div class="col-xs-6">
        <a class="block block-rounded" href="base_pages_dashboard.html">
            <div class="block-content text-white bg-default">
                <i class="si si-speedometer fa-2x"></i>
                <div class="font-w600 push-15-t push-15">Backend</div>
            </div>
        </a>
    </div>
    <div class="col-xs-6">
        <a class="block block-rounded" href="bd_dashboard.html">
            <div class="block-content text-white bg-modern">
                <i class="si si-rocket fa-2x"></i>
                <div class="font-w600 push-15-t push-15">Boxed</div>
            </div>
        </a>
    </div>
@endcomponent

@component('admin.partials.modal',['theme'=>'dark'])
    @slot('id')
        apps-modal2
    @endslot
    @slot('title')
        测试Modal2
    @endslot
    <div class="col-xs-6">
        <a class="block block-rounded" href="base_pages_dashboard.html">
            <div class="block-content text-white bg-default">
                <i class="si si-speedometer fa-2x"></i>
                <div class="font-w600 push-15-t push-15">Backend</div>
            </div>
        </a>
    </div>
    <div class="col-xs-6">
        <a class="block block-rounded" href="bd_dashboard.html">
            <div class="block-content text-white bg-modern">
                <i class="si si-rocket fa-2x"></i>
                <div class="font-w600 push-15-t push-15">Boxed</div>
            </div>
        </a>
    </div>
@endcomponent
@endsection
