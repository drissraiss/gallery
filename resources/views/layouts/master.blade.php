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

</head>

<body dir="{{ $dir }}">
    <!-- s alert -->
    {{-- <div class="alert alert-danger alert-dismissible fade show" style="position: absolute; right: 0; opacity: .8"
        role="alert">
        <strong>Eroooooooor</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}
    <!-- e alert -->
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
            background-color: #e6e6e6;
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
    </style>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-auto p-0" id="nav-cat">
                <ul class="list-group categories ">
                    <li class="ps-3 pe-3 pt-2 pb-2 fw-bold  d-flex align-items-center mx-auto" id="title-cat">Categories
                    </li>
                    <a href="" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-center position-static">
                            Personal
                            <span class="badge bg-primary badge-pill ms-5">14</span>
                        </li>
                    </a>
                    <a href="" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-center position-static">
                            Family
                            <span class="badge bg-primary badge-pill">2</span>
                        </li>
                    </a>
                    <a href="" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-center position-static">
                            Job
                            <span class="badge bg-primary badge-pill">1</span>
                        </li>
                    </a>
                    <a href="" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-center position-static">
                            Favorite
                            <span class="badge bg-primary badge-pill">1</span>
                        </li>
                    </a>
                    <li class="ps-3 pe-3 pt-2 pb-2 border border-top-0 bg-white list-unstyled" id="add_category">
                        <span id="text_add_category">+ Add category</span>
                        <form action="" style="display:none" id="form_add_category">
                            <input type="text" id="input_add_category" class="form-control"
                                placeholder="Name category">
                        </form>
                    </li>
                </ul>
            </div>

            <div class="col bg-white">
                <div class="row" id="nav-header">
                    <div class="col p-2 d-flex ">
                        <div class="col d-flex justify-content-between">
                            <form action="" class="w-auto d-flex justify-content-between ">
                                <input type="text" placeholder="Name picture" class="w-auto form-control">
                                <select name="" id="" class="ms-2 form-select">
                                    <option value="personal">Personal</option>
                                    <option value="family">Family</option>
                                    <option value="job">Job</option>
                                    <option value="favorite">Favorite</option>
                                </select>
                                <input type="file" name="" id="" class="ms-2 form-control">
                                <button class="btn btn-success ms-2">Add</button>
                            </form>

                            <li class="nav-item dropdown list-unstyled w-auto position-static">
                                <button class="btn dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $username }}
                                </button>
                                <ul class="dropdown-menu ">
                                    <li><a class="dropdown-item" href="settings">Setting</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row m-3" >
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
