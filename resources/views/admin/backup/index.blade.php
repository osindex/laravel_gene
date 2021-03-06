@extends('admin.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <section class="block">
      <div class="block-content">
        <div class="row">
          <div class="col-md-8">
          </div>
          <div class="col-md-4 text-right">
            <button id="create-new-backup-button" href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup/create') }}" class="btn btn-default btn-sm margin-left ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> {{ trans('backup.create_a_new_backup') }}</span></button>
          </div>
        </div>
      </div>
    </section>

    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">{{ trans('backup.existing_backups') }}:</h3>
        <div class="block-tools pull-right">
        </div>
      </div>
      <div class="block-content">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('backup.location') }}</th>
                <th>{{ trans('backup.date') }}</th>
                <th class="text-right">{{ trans('backup.file_size') }}</th>
                <th class="text-right">{{ trans('backup.actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($backups as $k => $b)
              <tr>
                <th scope="row">{{ $k+1 }}</th>
                <td>{{ $b['disk'] }}</td>
                <td>{{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%Y-%m-%d, %H:%M') }}</td>
                <td class="text-right">{{ round((int)$b['file_size']/1048576, 2).' MB' }}</td>
                <td class="text-right">
                    @if ($b['download'])
                    <a class="btn btn-xs btn-default" href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup/download/') }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}"><i class="fa fa-cloud-download"></i> {{ trans('backup.download') }}</a>
                    @endif
                    <a class="btn btn-xs btn-danger" data-button-type="delete" href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup/delete/'.$b['file_name']) }}?disk={{ $b['disk'] }}"><i class="fa fa-trash-o"></i> {{ trans('backup.delete') }}</a>
                </td>
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
@push('htmlstart')

@endpush
@push('htmlend')
    <!-- Ladda Buttons (loading buttons) -->
    <script src="{{ asset('vendor/js/spin.min.js') }}"></script>
    <script src="{{ asset('vendor/js/ladda.min.js') }}"></script>
    <!-- Page JS Plugins -->
<script>
  jQuery(document).ready(function($) {

    // capture the Create new backup button
    $("#create-new-backup-button").click(function(e) {
        e.preventDefault();
        var create_backup_url = $(this).attr('href');
        // Create a new instance of ladda for the specified button
        var l = Ladda.create( document.querySelector( '#create-new-backup-button' ) );

        // Start loading
        l.start();

        // Will display a progress bar for 10% of the button width
        l.setProgress( 0.3 );

        setTimeout(function(){ l.setProgress( 0.6 ); }, 2000);

        // do the backup through ajax
        $.ajax({
                url: create_backup_url,
                type: 'PUT',
                data: {_token: $('meta[name="csrf-token"]').attr('content')},
                success: function(result) {
                    l.setProgress( 0.9 );
                    console.log(result);
                    // Show an alert with the result
                    if (result === 'success') {
                        swal("{{ trans('backup.create_confirmation_title') }}", "{{ trans('backup.create_confirmation_message') }}", 'success');
                    }
                    else
                    {
                        swal("{{ trans('backup.create_warning_title') }}", "{{ trans('backup.create_warning_message') }}", 'error');
                    }

                    // Stop loading
                    l.setProgress( 1 );
                    l.stop();
                    // refresh the page to show the new file
                    setTimeout(function(){ location.reload(); }, 3000);
                },
                error: function(result) {
                    l.setProgress( 0.9 );
                    swal("{{ trans('backup.create_error_title') }}", "{{ trans('backup.create_error_message') }}", 'error');

                    // Stop loading
                    l.stop();
                }
            });
    });

    // capture the delete button
    $("[data-button-type=delete]").click(function(e) {
        e.preventDefault();
        var delete_button = $(this);
        var delete_url = $(this).attr('href');

        swal({
            title: "{{ trans('backup.delete_confirm') }}",
            text: '请确认',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d26a5c',
            confirmButtonText: '是的',
            html: false,
            preConfirm: function() {
                return new Promise(function (resolve) {
                    setTimeout(function () {
                        resolve();
                    }, 50);
                });
            }
        }).then(function(result){
            if (result.value) {
                $.ajax({
                url: delete_url,
                data: {_token: $('meta[name="csrf-token"]').attr('content')},
                type: 'DELETE',
                success: function(result) {
                    // Show an alert with the result
                    swal("{{ trans('backup.delete_confirmation_title') }}", "{{ trans('backup.delete_confirmation_message') }}", 'success');
                    // delete the row from the table
                    delete_button.parentsUntil('tr').parent().remove();
                },
                error: function(result) {
                    // Show an alert with the result
                    swal("{{ trans('backup.delete_error_title') }}", "{{ trans('backup.delete_error_message') }}", 'error');
                }
                });
                // swal('Deleted!', 'Your imaginary file has been deleted.', 'success');
                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            } else if (result.dismiss === 'cancel') {
                swal("{{ trans('backup.delete_cancel_title') }}", "{{ trans('backup.delete_cancel_message') }}", 'info');
            }
        });

      });

  });
</script>
@endpush
