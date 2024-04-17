@yield('modals')

@include('course.modal.certificate-opinion')

<!-- Уведомления -->
<div class="modal modal-notify" data-modal-id="notify">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <h6 data-title class="modal-title"></h6>
        </div>
    </div>
</div>