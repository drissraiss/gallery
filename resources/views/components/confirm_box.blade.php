@props(['id', 'title', 'message', 'confirm', 'cancel'])
<div id="{{ $id }}" class="confirmation-box" style="display:none">
    <h2 class="fw-bold">{{ $title }}</h2>
    <p>{{ $message }}</p>
    <div class="button-container">
        <button class="confirm-button fw-bold btn btn-outline-danger">{{ $confirm }}</button>
        <button class="cancel-button fw-bold btn btn-success">{{ $cancel }}</button>
    </div>
</div>

