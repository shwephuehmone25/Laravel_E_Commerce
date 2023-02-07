<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
<div class="px-2">
    @foreach (['success', 'danger', 'warning', 'info'] as $alert)
        @if (session($alert))
            <div class="alert alert-{{ $alert }} alert-dismissible mt-2">
                <button type="button" class="close btn" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i>
                {{ session($alert) }}
            </div>
        @endif
    @endforeach
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".close").click(function() {
            $(".alert").hide();
        });
    });
</script>
