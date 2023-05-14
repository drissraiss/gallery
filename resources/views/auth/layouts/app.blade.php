<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">
    <x-Bootstrap_css />
    <title>{{ __('master.title') }}</title>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>

<body dir="{{ $dir }}">
    @yield("alert")
    <div>
        <section class="vh-100">
            <div class="container py-5 h-100  ">
                <div class="row d-flex align-items-center justify-content-center h-100 " style="position: relative;">
                    <div class="col-md-8 col-lg-7 col-xl-6 {{ $dir == 'rtl' ? 'offset-xl-1' : '' }}">
                        <img src="{{ asset('assets/gallery.jpg') }}" class="img-fluid" alt="Phone image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 {{ $dir == 'rtl' ? '' : 'offset-xl-1' }}">
                        <div class="btn-group"
                            style="position: absolute; top:0; {{ $dir == 'rtl' ? 'left' : 'right' }}: 0;"
                            dir="ltr">
                            <a class="btn btn-outline-secondary {{ $cur_lang == 'en' ? 'active' : '' }}"
                                href="{{ route('change_lang', 'en') }}">{{ __('login.en') }}</a>
                            <a class="btn btn-outline-secondary {{ $cur_lang == 'fr' ? 'active' : '' }}"
                                href="{{ route('change_lang', 'fr') }}">{{ __('login.fr') }}</a>
                            <a class="btn btn-outline-secondary {{ $cur_lang == 'ar' ? 'active' : '' }}"
                                href="{{ route('change_lang', 'ar') }}">{{ __('login.ar') }}</a>
                        </div>
                        @yield('form')
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-Bootstrap_js />
</body>

</html>
