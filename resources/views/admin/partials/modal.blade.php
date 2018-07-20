<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-sm modal-dialog modal-dialog-top">
      <div class="modal-content">
          <!-- Apps Block -->
          <div class="block block-themed block-transparent">
              <div class="block-header bg-primary-{{ $theme ?? 'dark' }}">
                  <ul class="block-options">
                      <li>
                          <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                      </li>
                  </ul>
                  <h3 class="block-title">{{ $title }}</h3>
              </div>
              <div class="block-content">
                  <div class="row text-center">
                      {!! $slot !!}
                  </div>
              </div>
          </div>
          <!-- END Apps Block -->
      </div>
  </div>
</div>