@extends('admin.app')

@section('location')
<li>后台</li>
<li><a class="link-effect" href="">{{$location['name']}}</a></li>
@endsection
@section('content')
<!-- Page Content -->
<div class="content content-narrow">
    <h2 class="content-heading" data-toggle="modal" data-target="#apps-modal2">头部</h2>
    <div class="row">
        <div class="col-lg-6">
            <!-- Lines Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Lines</h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Lines Chart Container -->
                    <div style="height: 330px;"><canvas class="js-chartjs-lines"></canvas></div>
                </div>
            </div>
            <!-- END Lines Chart -->
        </div>
        <div class="col-lg-6">
            <!-- Bars Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Bars</h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Bars Chart Container -->
                    <div style="height: 330px;"><canvas class="js-chartjs-bars"></canvas></div>
                </div>
            </div>
            <!-- END Bars Chart -->
        </div>
        <div class="col-lg-6">
            <!-- Radar Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Radar</h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Radar Chart Container -->
                    <div style="height: 330px;"><canvas class="js-chartjs-radar"></canvas></div>
                </div>
            </div>
            <!-- END Radar Chart -->
        </div>
        <div class="col-lg-6">
            <!-- Polar Area Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Polar Area</h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Polar Area Chart Container -->
                    <div style="height: 330px;"><canvas class="js-chartjs-polar"></canvas></div>
                </div>
            </div>
            <!-- END Polar Area Chart -->
        </div>
        <div class="col-lg-6">
            <!-- Pie Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Pie</h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Pie Chart Container -->
                    <div style="height: 330px;"><canvas class="js-chartjs-pie"></canvas></div>
                </div>
            </div>
            <!-- END Pie Chart -->
        </div>
        <div class="col-lg-6">
            <!-- Donut Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Donut</h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Donut Chart Container -->
                    <div style="height: 330px;"><canvas class="js-chartjs-donut"></canvas></div>
                </div>
            </div>
            <!-- END Donut Chart -->
        </div>
    </div>
</div>
<!-- END Page Content -->
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
