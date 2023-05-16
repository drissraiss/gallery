@extends('layouts.master')
@section('content')
    <div class="border mb-4">
        <h3>Change language </h3>
        <div class="form-outline mb-4">
            <label class="form-label" for="language">Language:</label>
            <div class="btn-group btn-group-sm" style="{{ $dir == 'rtl' ? 'left' : 'right' }}: 0;" dir="ltr">
                <a class="btn btn-outline-primary {{ $cur_lang == 'en' ? 'active' : '' }}"
                    href="{{ route('change_lang', 'en') }}">{{ __('login.en') }}</a>
                <a class="btn btn-outline-primary {{ $cur_lang == 'fr' ? 'active' : '' }}"
                    href="{{ route('change_lang', 'fr') }}">{{ __('login.fr') }}</a>
                <a class="btn btn-outline-primary {{ $cur_lang == 'ar' ? 'active' : '' }}"
                    href="{{ route('change_lang', 'ar') }}">{{ __('login.ar') }}</a>
            </div>
        </div>

    </div>
    <form action="{{ route('update_password') }}" class="border mb-4" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <h3>Change password: </h3>
        <div class="form-outline mb-4">
            <label for="curr_password" class="form-label">Current password:</label>
            <input type="password" name="curr_password" class="form-control" id="curr_password">
            @error('curr_password')
                <x-alert alert='Error' bg='danger' :message="$message" />
            @enderror
            @error('curr_password')
                <p class="text-danger">{{ $message }}
                </p>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label for="password" class="form-label">New password:</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
                <x-alert alert='Error' bg='danger' :message="$message" />
            @enderror
            @error('password')
                <p class="text-danger">{{ $message }}
                </p>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label for="password_confirmation" class="form-label">Repeat password:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            @error('password_confirmation')
                <x-alert alert='Error' bg='danger' :message="$message" />
            @enderror
            @error('password_confirmation')
                <p class="text-danger">{{ $message }}
                </p>
            @enderror
        </div>
        <button class="btn btn-primary w-100 mb-2">Update password</button>
    </form>
    <form action="{{ route('update_category') }}" method="POST" class="border mb-4">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <h3>Update category</h3>
        <div class="form-outline mb-4">
            <label class="form-label" for="category_id">Current name:</label>
            <select name="category_id" id="category_id" class="form-select">
                <x-category_options :categories="$categories" selected="{{ old('category_id') }}" />
            </select>
        </div>
        <div class="form-outline mb-4">
            <label for="category_name" class="form-label">New name:</label>
            <input type="text" name="category_name" class="form-control" id="category_name"
                value="{{ old('category_name') }}">
            @error('category_name')
                <x-alert alert='Error' bg='danger' :message="$message" />
            @enderror
            @error('category_name')
                <p class="text-danger">{{ $message }}
                </p>
            @enderror
        </div>
        <button class="btn btn-primary w-100 mb-2">Update category</button>
    </form>
    <form action="{{ route('delete_category') }}" class="border mb-4 " method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <h3>Remove category</h3>
        <span class="mark fw-light">NB: If you delete any category, you cannot retrieve the images inside it.</span>
        <div class="form-outline mb-4">
            <label class="form-label" for="category_delete">Category:</label>
            <select name="category_delete" id="category_delete" class="form-select ">
                <x-category_options :categories="$categories" selected="{{ old('category_delete') }}" />
            </select>
        </div>
        <button class="btn btn-danger w-100 mb-2 {{ count($categories) == 0 ? 'disabled' : '' }}">Remove category</button>
    </form>
    <form action="" class="border mb-4">
        @csrf
        <h3>Remove account</h3>
        <div class="form-outline mb-4">
            <label for="password_" class="form-label">Password:</label>
            <input type="password" name="password_" class="form-control" id="password_">
        </div>
        <button class="btn btn-danger w-100 mb-2 ">Drop account</button>
    </form>
@endsection
