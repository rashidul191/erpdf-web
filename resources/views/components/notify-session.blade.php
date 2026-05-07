@if (session('success'))
<div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
    <div id="liveToast" class="toast" role="alert">
        <div class="toast-header">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="bg-success toast-body text-white">
            {{ session('success') }}
        </div>
    </div>
</div>
<!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast({!!json_encode(session('success'))!!}, 'success');
        });
    </script> -->
@endif

@if (session('error'))
<div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
    <div id="liveToast" class="toast" role="alert">
        <div class="toast-header">
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="bg-danger toast-body text-white">
            {{ session('error') }}
        </div>
    </div>
</div>
<!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast({!!json_encode(session('error'))!!}, 'error');
        });
    </script> -->
@endif
@if (session('warning'))
<div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
    <div id="liveToast" class="toast" role="alert">
        <div class="toast-header">
            <strong class="me-auto">Warning</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="bg-warning toast-body text-white">
            {{ session('warning') }}
        </div>
    </div>
</div>
<!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast({
                !!json_encode(session('warning')) !!
            }, 'warning');
        });
    </script> -->
@endif