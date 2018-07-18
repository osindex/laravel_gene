@include('admin.partials.htmlheader')
<body>
  <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
    <!-- Sidebar -->
    @include('admin.partials.sidebar')
    <!-- END Sidebar -->

    <!-- Header -->
    @include('admin.partials.header-navbar')
    <!-- END Header -->
    <!-- Main Container -->
    <main id="main-container">
<!--             <div class="bg-gray-lighter" style="padding:0px 30px 5px 0">
                <div class="row">
                    <div class="col-sm-12 text-right hidden-xs">
                        <ol class="breadcrumb push-10-t">
                            <li><a href="#"><i class="si si-speedometer"></i> 后台首页</a></li>
                            <li class="active">@yield('htmlheader_title', 'SWPU 60th')</li>
                        </ol>
                    </div>
                </div>
              </div> -->
              <!-- Page Content -->
              <div class="content">
                @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p><i class="fa fa-info-circle"></i> {{ Session::get('message') }}</p>
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
                @yield('main-content')
              </div>
              <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            @include('admin.partials.footer')
          </body>
          </html>