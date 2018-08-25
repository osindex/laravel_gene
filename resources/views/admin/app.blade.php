@include('admin.partials.htmlheader')
<body>
    <div id="app">
        <!-- Page Container -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
            @if(0)
            @include('admin.partials.side-overlay')
            @endif
            <!-- END Side Overlay -->

            <!-- Sidebar -->

            @include('admin.partials.sidebar')

            <!-- END Sidebar -->

            <!-- Header -->

            @include('admin.partials.header-navbar')

            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p><i class="fa fa-info-circle"></i> {{ Session::get('message') }}</p>
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p><i class="fa fa-info-circle"></i> {{ Session::get('success') }}</p>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p><i class="fa fa-info-circle"></i> {{ Session::get('error') }}</p>
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                @if(false)
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                @yield('subject','控制面板') <small>@yield('subject_desc')</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                @section('location')
                                <li>控制面板</li>
                                @show
                            </ol>
                        </div>
                    </div>
                </div>
                @endif
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Full Table -->
                    <div class="block">
                         @yield('content')
                    </div>
                    <!-- END Full Table -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        @include('admin.partials.footer')
        </div>
        <!-- END Page Container -->
    </div>
    <script src="{{ asset('assets/js/all.js') }}"></script>
    <!-- 引入常用组件 -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}} "></script>

    @stack('htmlend')
    @php
    /*
    <!-- Page JS Plugins -->
    <!-- <script src="/assets/js/plugins/sparkline/jquery.sparkline.min.js"></script> -->
    <!-- <script src="/assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script> -->
    <!-- <script src="/assets/js/plugins/chartjs/Chart.min.js"></script> -->
    <!-- <script src="/assets/js/plugins/flot/jquery.flot.min.js"></script> -->
    <!-- <script src="/assets/js/plugins/flot/jquery.flot.pie.min.js"></script> -->
    <!-- <script src="/assets/js/plugins/flot/jquery.flot.stack.min.js"></script> -->
    <!-- <script src="/assets/js/plugins/flot/jquery.flot.resize.min.js"></script> -->

    <!-- Page JS Code -->
    <!-- <script src="/assets/js/pages/base_comp_charts.js"></script> -->
    <!-- 在resource js pages 学习前端代码 -->
    */
    @endphp
    <script type="text/javascript">
        function json2params(url,json) {
            // console.log(json);
            return url + '?' + Object.keys(json).map(function (key) {
                    // console.log(key);
                    // console.log(json[key]);
                    // console.log(typeof(json[key]) === 'object');
                    if(typeof(json[key]) === 'object'){
                        v =  JSON.stringify(json[key]);
                    }else{
                        v =  encodeURIComponent(json[key]);
                    }
                    return encodeURIComponent(key) + "=" +v;
                }).join("&");
        }
        function getObjectURL(file) {
            var url = null ;
            if (window.createObjectURL!=undefined) { // basic
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }
        jQuery(function () {
            // Init page helpers (plugin)
            App.initHelpers('notify');
            // App.initHelpers('easy-pie-chart');
            // App.initHelpers(['maxlength','datetimepicker']);
            // 引入插件的时候 需要加入额外的js
            @stack('scripts')
        });
    </script>
</body>
</html>
