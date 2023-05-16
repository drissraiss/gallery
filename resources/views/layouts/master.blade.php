<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">
    <x-Bootstrap_css />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>{{ __('master.title') }}</title>
    <style>
        body {
            background-color: #e6e6e6;
        }

        .categories>a>li.list-group-item {
            cursor: pointer;
        }

        .categories>a>li.list-group-item:hover {
            /*  background-color: rgb(238, 238, 238) */
        }

        .categories #add_category {
            cursor: pointer;
            background-color: #eeffee !important;
        }

        #nav-cat {

            height: 100vh;
        }

        #nav-header {
            background-color: #e6e6e6;
            height: 55px;
        }

        #title-cat {
            height: 55px;
            justify-content:
        }

        .input-text-custom {
            display: inline-block;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 16px;
            line-height: 1.5;
            border: none;
            outline: none;
            background-color: transparent;
        }

        .disabled-input input,
        .disabled-input select {
            pointer-events: none;
            background-color: #f5f5f5;
            /* Optionally, you can add additional styling to indicate the field is disabled */
            color: #9b9b9b;
        }

        .card-custom-1 {
            background-color: #e6e6e6
        }

        .content-bg {
            background-color: #e6e6e6
        }
        .selected-category-bg {
            background-color: #0d6efd38
        }
    </style>
</head>

<body dir="{{ $dir }}">
    @if (session('success'))
        <x-alert alert="Success" bg="success" message="{{ session('success') }}" />
    @elseif (session('error'))
        <x-alert alert="Error" bg="danger" message="{{ session('error') }}" />
    @endif
    @if (session('category_not_found'))
        <x-alert alert="Error" bg="danger" message="Sorry, this category does not exist" />
    @endif
    @error('category_name_add')
        <x-alert alert="Error" bg="danger" :message="$message" />
    @enderror
    @error('picture_name_shortcut')
        <x-alert alert="Error" bg="danger" :message="$message" />
    @enderror
    @error('picture_shortcut')
        <x-alert alert="Error" bg="danger" :message="$message" />
    @enderror
    @error('new_name_picture')
        <x-alert alert="Error" bg="danger" :message="$message" />
    @enderror
    <div class="container-fluid">
        <div class="row ">
            <div class="col-auto p-0" id="nav-cat">
                <ul class="list-group categories ">
                    <a href="{{ route('home') }}"
                        class="d-flex align-items-center mx-auto text-black text-decoration-none">
                        <li class="ps-3 pe-3 pt-2 pb-2 fw-bold  d-flex align-items-center mx-auto" id="title-cat">
                            Gallery
                        </li>
                    </a>
                    @foreach ($categories_with_count as $category_with_count)
                        <a href="{{ route('category', $category_with_count->category) }}" class="text-decoration-none">
                            <li
                            class="list-group-item d-flex justify-content-between align-items-center position-static {{ $category_selected_name == $category_with_count->category ?  'fw-bold fst-italic' : '' }}">
                                {{ $category_with_count->category }}
                                <span
                                    class="badge bg-{{ $category_with_count->count == 0 ? '' : 'primary' }} badge-pill ms-5">{{ $category_with_count->count == 0 ? '' : $category_with_count->count }}</span>
                            </li>
                        </a>
                    @endforeach
                    <li class="ps-3 pe-3 pt-2 pb-2 border border-top-0 bg-white list-unstyled" id="add_category">
                        <span id="text_add_category">+ Add category</span>
                        <form action="{{ route('add_category') }}" method="POST" style="display:none"
                            id="form_add_category">
                            @csrf
                            <input type="text" id="input_add_category" name="category_name_add" class="form-control"
                                placeholder="Name category">

                        </form>
                    </li>
                </ul>
            </div>

            <div class="col bg-white">
                <div class="row" id="nav-header">
                    <div class="col p-2 d-flex ">
                        <div class="col d-flex justify-content-between">
                            <form action="{{ route('add_picture_shortcut') }}" method="post"
                                enctype="multipart/form-data"
                                class="w-auto d-flex justify-content-between {{ count($categories) == 0 ? 'disabled-input' : '' }}">
                                @csrf
                                <input type="text" name="picture_name_shortcut" value="Picture"
                                    placeholder="Name picture" class="w-auto form-control ">
                                <select name="select_categories_home_shortcut" id="" class="ms-2 form-select">
                                    <x-category_options :categories="$categories"
                                        selected="{{ old('select_categories_home_shortcut') ?? $category_selected_id }}" />
                                </select>

                                <input type="file" accept="image/*" name="picture_shortcut" id=""
                                    class="ms-2 form-control">
                                <button
                                    class="btn btn-success ms-2 {{ count($categories) == 0 ? 'disabled' : '' }}">Add</button>
                            </form>

                            <li class="nav-item dropdown list-unstyled w-auto position-static">
                                <button class="btn dropdown-toggle fw-bold bg-white" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ $username }}
                                </button>
                                <ul class="dropdown-menu ">
                                    <li><a class="dropdown-item " href="{{ route('settings') }}">Setting</a></li>
                                    <li><a class="dropdown-item text-danger fw-bold"
                                            href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row m-3">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-Bootstrap_js />
    <script>
        let add_category = document.querySelector('#add_category');
        let text_add_category = document.querySelector('#text_add_category');
        let form_add_category = document.querySelector('#form_add_category');
        let input_add_category = document.querySelector('#input_add_category');
        let input_text_custom = document.querySelectorAll('.input-text-custom');
        add_category.onclick = () => {
            text_add_category.style.display = 'none';
            form_add_category.style.display = 'block';
            input_add_category.focus();
        }
        input_add_category.onblur = () => {
            text_add_category.style.display = 'inline';
            form_add_category.style.display = 'none';
        }
        input_text_custom.forEach(element => {
            element.ondblclick = () => {
                element.removeAttribute('readonly');
            }
        })
    </script>
</body>

</html>
