<!DOCTYPE html>
<html>

@include('admin.partials.htmlheader')
<body class="skin-blue sidebar-mini">
    <div class="wrapper">

        @include('admin.partials.mainheader')

        @include('admin.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @include('admin.partials.contentheader')

            <!-- Main content -->
            <section class="content">
                @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p><i class="fa fa-info-circle"></i> {{ Session::get('message') }}</p>
              </div>
              @endif
              <!-- Your Page Content Here -->
              @yield('main-content')
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      @include('admin.partials.controlsidebar')

      @include('admin.partials.footer')

  </div><!-- ./wrapper -->

  @include('admin.partials.scripts')

</body>
</html>