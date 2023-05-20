<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">
    <x-Bootstrap_css />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <title>{{ __('app.title') }}</title>
</head>

<body dir="{{ $dir }}">
    @if (session('success'))
        <x-alert alert="{{ __('app.success') }}" bg="success" message="{{ session('success') }}" />
    @elseif (session('error'))
        <x-alert alert="{{ __('app.error') }}" bg="danger" message="{{ session('error') }}" />
    @endif
    @error('category_name_add')
        <x-alert alert="{{ __('app.error') }}" bg="danger" :message="$message" />
    @enderror
    @error('picture_name_shortcut')
        <x-alert alert="{{ __('app.error') }}" bg="danger" :message="$message" />
    @enderror
    @error('picture_shortcut')
        <x-alert alert="{{ __('app.error') }}" bg="danger" :message="$message" />
    @enderror
    @error('new_name_picture')
        <x-alert alert="{{ __('app.error') }}" bg="danger" :message="$message" />
    @enderror
    <div class="container-fluid" id="body">
        <div class="row">
            <div class="col-auto p-0" id="nav-cat">
                <ul class="list-group categories pe-0">
                    <a href="{{ route('home') }}"
                        class="d-flex align-items-center mx-auto text-black text-decoration-none">
                        <li class="ps-3 pe-3 pt-2 pb-2 fw-bold  d-flex align-items-center mx-auto" id="title-cat">
                            {{ __('app.title') }}
                        </li>
                    </a>
                    @foreach ($categories_with_count as $category_with_count)
                        <a href="{{ route('category', $category_with_count->category) }}" class="text-decoration-none">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center position-static {{ $category_selected_name == $category_with_count->category ? 'fw-bold fst-italic' : '' }}">
                                {{ $category_with_count->category }}
                                <span
                                    class="badge bg-{{ $category_with_count->count == 0 ? '' : 'primary' }} badge-pill m{{ $dir == 'rtl' ? 'e' : 's' }}-5">{{ $category_with_count->count == 0 ? '' : $category_with_count->count }}</span>
                            </li>
                        </a>
                    @endforeach
                    <li class="ps-3 pe-3 pt-2 pb-2 border border-top-0 bg-white list-unstyled" id="add_category">
                        <span id="text_add_category">{{ __('master.add_category') }}</span>
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
                                <input type="text" name="picture_name_shortcut" value="{{ __('master.value_pic') }}"
                                    placeholder="Name picture" class="w-auto form-control ">
                                <select name="select_categories_home_shortcut" class="ms-2 form-select">
                                    <x-category_options :categories="$categories"
                                        selected="{{ old('select_categories_home_shortcut') ?? $category_selected_id }}" />
                                </select>
                                <input type="file" accept="image/*" name="picture_shortcut"
                                    class="ms-2 form-control">
                                <button
                                    class="btn btn-success ms-2 {{ count($categories) == 0 ? 'disabled' : '' }}">{{ __('master.add_pic') }}</button>
                            </form>
                            <li class="nav-item dropdown list-unstyled w-auto position-static">
                                <button class="btn dropdown-toggle fw-bold bg-white" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ $username }}
                                </button>
                                <ul class="dropdown-menu ">
                                    <li><a class="dropdown-item "
                                            href="{{ route('settings') }}">{{ __('master.settings') }}</a></li>
                                    <li><a class="dropdown-item text-danger fw-bold"
                                            href="{{ route('logout') }}">{{ __('master.logout') }}</a></li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row mt-3">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- s confirm box -->
    <x-confirm_box id="confirmation-box-picture" title="{{ __('confirm_box.title_picture') }}"
        message="{{ __('confirm_box.message_picture') }}" confirm="{{ __('confirm_box.confirm') }}"
        cancel="{{ __('confirm_box.cancel') }}" />
    <x-confirm_box id="confirmation-box-category" title="{{ __('confirm_box.title_category') }}"
        message="{{ __('confirm_box.message_category') }}" confirm="{{ __('confirm_box.confirm') }}"
        cancel="{{ __('confirm_box.cancel') }}" />
    <x-confirm_box id="confirmation-box-account" title="{{ __('confirm_box.title_account') }}"
        message="{{ __('confirm_box.message_account') }}" confirm="{{ __('confirm_box.confirm') }}"
        cancel="{{ __('confirm_box.cancel') }}" />
    <!-- e confirm box -->
    <x-Bootstrap_js />
    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/master.js') }}"></script>
</body>

</html>
