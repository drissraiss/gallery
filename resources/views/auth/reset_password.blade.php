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

<body>
    <!-- -->
    <div class="" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="text-center mt-3">
            <img src="{{ asset('assets/favicon.ico') }}" style="width: 150px" alt="">
        </div>

        <div class="container bg-white p-4 my-2 pb-2">
            <h1>{{ __('email_reset_password.hello') }} <span
                    class="text-decoration-underline fw-bold">{{ $user->username }}</span></h1>
            <p>{{ __('email_reset_password.text_1') }}</p>

            <div class="text-center my-3"><a
                    href="http://127.0.0.1:8000/change_password?reset_password={{ $reset_password }}&email={{ $user->email }}"
                    class="btn btn-lg btn-primary">{{ __('email_reset_password.btn_reset') }}</a></div>

            <p>{{ __('email_reset_password.text_2') }}</p>
            <p>{{ __('email_reset_password.text_3') }}</p>
            <hr>
            <p class="fw-light">{{ __('email_reset_password.text_4') }} <a
                    href="http://127.0.0.1:8000/change_password?reset_password={{ $reset_password }}&email={{ $user->email }}">http://127.0.0.1:8000/change_password?reset_password={{ $reset_password }}&email={{ $user->email }}</a>
            </p>
            <br>
            <div>
                <p>{{ __('email_reset_password.from') }} : gallery@drs.com</p>
            </div>
        </div>

        <div class="p-5">
            <p class="text-center">{{ __('email_reset_password.footer') }}</p>
        </div>
    </div>
    <!-- -->
</body>

</html>
