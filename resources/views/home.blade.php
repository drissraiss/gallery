@extends('layouts.master')

@section('content')
    @if (!count($categories))
        <h4 class="fst-italic mark">{{ __('home.nb') }}</h4>
    @endif
    <div class="d-flex">
        <div class="w-auto ">
            <form action="{{ count($categories) == 0 ? '' : route('add_picture') }}"
                method="{{ count($categories) == 0 ? 'get' : 'post' }}"
                class="border content-bg p-3 {{ count($categories) == 0 ? 'disabled-input' : '' }}"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-center">{{ __('home.add_new_pic') }}</h1>
                <div class="mb-3">
                    <label for="picture_name" class="form-label">{{ __('home.name_pic') }}:</label>
                    <input type="text" name="picture_name" id="picture_name" value="{{ __('home.value_pic') }}"
                        class="form-control" value="{{ old('picture_name') }}">
                    @error('picture_name')
                        <x-alert alert="{{ __('app.error') }}" bg='danger' :message="$message" />
                    @enderror
                    @error('picture_name')
                        <p class="text-danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="select_categories_home" class="form-label">{{ __('home.category') }}:</label>
                    <select name="select_categories_home" class="form-select " id="select_categories_home">
                        <x-category_options :categories="$categories" selected="{{ old('select_categories_home') }}" />
                    </select>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">{{ __('home.picture') }}:</label>
                    <input type="file" accept="image/*" name="picture" id="picture" class="form-control ">
                    @error('picture')
                        <x-alert alert="{{ __('app.error') }}" bg='danger' :message="$message" />
                    @enderror
                    @error('picture')
                        <p class="text-danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <button
                    class="btn btn-success mb-3 w-100 {{ count($categories) == 0 ? 'disabled' : '' }}">{{ __('home.btn_add_pic') }}</button>
            </form>
        </div>
        <div class="mx-4 d-flex" id="preview-div" style=";">
            <img src="{{ asset('assets/gallery.jpg') }}" class="" id="preview-img" style="display: none"
                width="400px" alt="">
            <div class="m-auto" id="preview-text">
                {{ __('home.preview_pic') }}
            </div>
        </div>
    </div>
@endsection
