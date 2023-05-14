@extends('layouts.master')
@section('content')
    <form action="" class="border mb-4">
        @csrf
        <h3>Change language </h3>
        <div class="form-outline mb-4">
            <label class="form-label" for="language">Language:</label>
            <select name="language" id="language" class="form-select">
                <option value="english">English</option>
                <option value="french">French</option>
                <option value="arabic">Arabic</option>
            </select>
        </div>
        <button class="btn btn-primary w-100 mb-2">Save change</button>
    </form>
    <form action="" class="border mb-4">
        @csrf
        <h3>Change password: </h3>
        <div class="form-outline mb-4">
            <label for="curr_password" class="form-label">Current password:</label>
            <input type="password" name="curr_password" class="form-control" id="curr_password">
        </div>
        <div class="form-outline mb-4">
            <label for="password" class="form-label">New password:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-outline mb-4">
            <label for="password_confirmation" class="form-label">Repeat password:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
        <button class="btn btn-primary w-100 mb-2">Update password</button>
    </form>
    <form action="" class="border mb-4">
        @csrf
        <h3>Remove category</h3>
        <div class="form-outline mb-4">
            <label class="form-label" for="category">Category:</label>
            <select name="category" id="category" class="form-select">
                <option value="personal">Personal</option>
                <option value="family">Family</option>
                <option value="job">Job</option>
                <option value="favorite">Favorite</option>
            </select>
        </div>
        <button class="btn btn-danger w-100 mb-2">Remove category</button>
    </form>
    <form action="" class="border mb-4">
        @csrf
        <h3>Remove account</h3>
        <div class="form-outline mb-4">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button class="btn btn-danger w-100 mb-2">Drop account</button>
    </form>
@endsection
