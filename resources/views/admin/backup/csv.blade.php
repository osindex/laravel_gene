@extends('admin.app')

@section('content')
<div class="row">
  <div class="col-md-12">

    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">数据表导入:</h3>
        <div class="block-tools pull-right">
        </div>
      </div>
      <div class="block-content">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>#</th>
            </tr>
          </thead>
          <tbody>
            @php
            //dd(getToken());
            @endphp
              @foreach ($table as $k => $b)
              <tr>
                <th scope="row">{{ $b }}</th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="block-footer"></div>
      </section>
    </div>
</div>
@endsection
