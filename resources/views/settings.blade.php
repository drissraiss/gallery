@extends('layouts.master')
@section('content')
    <div class="div-setting">
        <div class="border mb-4 p-2">
            <h2 class=" mb-4 text-decoration-underline">{{ __('settings.change_lang') }}</h2>
            <div class="form-outline mb-4">
                <label class="form-label" for="language">{{ __('settings.language') }}:</label>
                <div class="btn-group btn-group" style="{{ $dir == 'rtl' ? 'left' : 'right' }}: 0;" dir="ltr">
                    <a class="btn btn-outline-primary {{ $cur_lang == 'en' ? 'active' : '' }}"
                        href="{{ route('change_lang', 'en') }}">{{ __('login.en') }}</a>
                    <a class="btn btn-outline-primary {{ $cur_lang == 'fr' ? 'active' : '' }}"
                        href="{{ route('change_lang', 'fr') }}">{{ __('login.fr') }}</a>
                    <a class="btn btn-outline-primary {{ $cur_lang == 'ar' ? 'active' : '' }}"
                        href="{{ route('change_lang', 'ar') }}">{{ __('login.ar') }}</a>
                </div>
            </div>
        </div>
        <form action="{{ route('update_password') }}" class="border mb-4 p-2" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <h2 class=" mb-4 text-decoration-underline">{{ __('settings.change_password') }}</h2>
            <div class="form-outline mb-4">
                <label for="curr_password" class="form-label">{{ __('settings.curr_password') }}:</label>
                <input type="password" name="curr_password" class="form-control" id="curr_password">
                @error('curr_password')
                    <x-alert alert="{{ __('app.error') }}" bg='danger' :message="$message" />
                @enderror
                @error('curr_password')
                    <p class="text-danger">{{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <label for="password" class="form-label">{{ __('settings.new_password') }}:</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                    <x-alert alert="{{ __('app.error') }}" bg='danger' :message="$message" />
                @enderror
                @error('password')
                    <p class="text-danger">{{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <label for="password_confirmation" class="form-label">{{ __('settings.repeat_password') }}:</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                @error('password_confirmation')
                    <x-alert alert="{{ __('app.error') }}" bg='danger' :message="$message" />
                @enderror
                @error('password_confirmation')
                    <p class="text-danger">{{ $message }}
                    </p>
                @enderror
            </div>
            <button class="btn btn-primary w-100 mb-2">{{ __('settings.btn_update_password') }}</button>
        </form>
        <form action="{{ route('update_category') }}" method="POST" class="border mb-4 p-2">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <h2 class=" mb-4 text-decoration-underline">{{ __('settings.update_category') }}</h2>
            <div class="form-outline mb-4">
                <label class="form-label" for="category_id">{{ __('settings.curr_name_category') }}:</label>
                <select name="category_id" id="category_id" class="form-select">
                    <x-category_options :categories="$categories" selected="{{ old('category_id') }}" />
                </select>
            </div>
            <div class="form-outline mb-4">
                <label for="category_name" class="form-label">{{ __('settings.new_name_category') }}:</label>
                <input type="text" name="category_name" class="form-control" id="category_name"
                    value="{{ old('category_name') }}">
                @error('category_name')
                    <x-alert alert="{{ __('app.error') }}" bg='danger' :message="$message" />
                @enderror
                @error('category_name')
                    <p class="text-danger">{{ $message }}
                    </p>
                @enderror
            </div>
            <button class="btn btn-primary w-100 mb-2">{{ __('settings.btn_update_category') }}</button>
        </form>
        <form action="{{ route('delete_category') }}" class="border mb-4 p-2 " method="POST" id="form-remove-category">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <h2 class=" mb-4 text-decoration-underline">{{ __('settings.remove_category') }}</h2>
            <span class="mark fw-light">{{ __('settings.nb') }}</span>
            <div class="form-outline mb-4">
                <label class="form-label" for="category_delete">{{ __('settings.name_category_remove') }}:</label>
                <select name="category_delete" id="category_delete" class="form-select ">
                    <x-category_options :categories="$categories" selected="{{ old('category_delete') }}" />
                </select>
            </div>
            <button
                class="btn btn-outline-danger w-100 mb-2 {{ count($categories) == 0 ? 'disabled' : '' }}">{{ __('settings.btn_remove_category') }}</button>
        </form>
        <form action="{{ route('drop_account_user') }}" class="border mb-4 p-2" method="POST" id="form-remove-account">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <h2 class=" mb-4 text-decoration-underline">{{ __('settings.remove_account') }}</h2>
            <div class="form-outline mb-4">
                <label for="password_drop_account"
                    class="form-label">{{ __('settings.password_remove_account') }}:</label>
                <input type="password" name="password_drop_account" class="form-control" id="password_drop_account">
                @error('password_drop_account')
                    <p class="text-danger">{{ $message }} </p>
                    <x-alert alert="{{ __('app.error') }}" bg="danger" :message="$message" />
                @enderror
            </div>
            <button class="btn btn-outline-danger w-100 mb-2 ">{{ __('settings.btn_drop_account') }}</button>
        </form>
    </div>
@endsection
