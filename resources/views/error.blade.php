@extends('blank')

@section('content')
<!-- Error Content -->
<div class="content bg-white text-center pulldown overflow-hidden">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <!-- Error Titles -->
            @php
            @endphp
            <h1 class="font-s128 font-w300 text-{{ (isset($error) && ($error > 499))?'modern':'city'}} animated flipInX">
            {{$error??'500'}} ?</h1>
            <h2 class="h3 font-w300 push-50 animated fadeInUp">
                @if(Session::get('message'))
                {{Session::get('message')??'未知错误'}}
                @else
                    处理错误
                @endif
            </h2>
            <!-- END Error Titles -->

            <!-- Search Form -->
            <!-- <form class="form-horizontal push-50" action="base_pages_search.html" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Search application..">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form> -->
            <!-- END Search Form -->
        </div>
    </div>
</div>
<!-- END Error Content -->

<!-- Error Footer -->
<div class="content pulldown text-muted text-center">
    @isset($errors)
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @endisset
    <br>
    <a class="link-effect" href="javascript:void(0)">报告</a> 或 <a class="link-effect" href="{{route('admin')}}">回到后台</a>
</div>
<!-- END Error Footer -->
@endsection