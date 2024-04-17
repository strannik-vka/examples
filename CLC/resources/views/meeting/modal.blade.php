<!-- просмотр онлайн-встречи -->
<div class="modal modal-meeting" data-modal-id="video-meeting" items-modal-meeting>
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-video" isset="iframe_src">
                <iframe width="720" height="405" attr="src:iframe_src" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            </div>
            <div class="modal-body">
                <div class="modal-title text-3 fw-500" html="name"></div>
                <div class="modal-description text-6" html="description"></div>
            </div>
        </div>
    </div>
</div>