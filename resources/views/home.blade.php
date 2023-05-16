@extends('layouts.master')

@section('content')
    <style>
        #preview-div {
            background-color: #e6e6e6;
            width: 400px;
        }
    </style>
    @if (!count($categories))
    <h4 class="fst-italic mark">NB: You cannot add any image until you add at least one category.</h4>
    @endif
    <div class="d-flex">
        <div class="w-auto ">
            <form action="{{ count($categories) == 0 ? '' : route('add_picture') }}"
                method="{{ count($categories) == 0 ? 'get' : 'post' }}"
                class="border content-bg p-3 {{ count($categories) == 0 ? 'disabled-input' : '' }}"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-center">Add new picture</h1>
                <div class="mb-3">
                    <label for="picture_name" class="form-label">Name picture:</label>
                    <input type="text" name="picture_name" id="picture_name" value="Picture" class="form-control"
                        value="{{ old('picture_name') }}">
                    @error('picture_name')
                        <x-alert alert='Error' bg='danger' :message="$message" />
                    @enderror
                    @error('picture_name')
                        <p class="text-danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="select_categories_home" class="form-label">Category:</label>
                    <select name="select_categories_home" class="form-select " id="select_categories_home">
                        <x-category_options :categories="$categories" selected="{{ old('select_categories_home') }}" />
                    </select>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture:</label>
                    <input type="file" accept="image/*" name="picture" id="picture" class="form-control ">
                    @error('picture')
                        <x-alert alert='Error' bg='danger' :message="$message" />
                    @enderror
                    @error('picture')
                        <p class="text-danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <button class="btn btn-success mb-3 w-100 {{ count($categories) == 0 ? 'disabled' : '' }}">Add
                    Picture</button>
            </form>

        </div>

        <div class="ms-4 d-flex" id="preview-div" style=";">
            <img src="{{ asset('assets/gallery.jpg') }}" class="" id="preview-img" style="display: none"
                width="400px" alt="">
            <div class="m-auto" id="preview-text">
                Preview image
            </div>
        </div>
    </div>
    <script>
        let picture = document.getElementById('picture')
        let preview_img = document.getElementById('preview-img')
        let preview_text = document.getElementById('preview-text')
        picture.onchange = (e) => update_preview(e)

        function update_preview(event) {
            preview_img.style.display = 'block'
            preview_text.style.display = 'none'
            let fileName = URL.createObjectURL(event.target.files[0])
            preview_img.setAttribute('src', fileName)
        }
    </script>
@endsection
