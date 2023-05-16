@props(['alert', 'bg','message'])
<div class="alert alert-{{ $bg }} alert-dismissible fade show" style="position: fixed;top:0; right: 0; " role="alert">
    <strong>{{ $alert }}</strong> {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
