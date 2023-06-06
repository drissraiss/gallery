@extends('auth.layouts.app')
@if (session('create_acc_success'))
    @section('alert')
        <div class="alert alert-success alert-dismissible fade show w-100 " style="position: absolute; opacity: .7;"
            role="alert">
            <strong>{{ __('login.success') }}</strong> {{ __('login.acc_created_success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsection
@endif

@section('form')
    <form action="{{ route('try_login') }}" method="POST">
        @csrf
        <div class="form-outline mb-4">
            <label class="form-label" for="email">{{ __('login.email') }} :</label>
            <input type="text" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') ?? $cookie_login_data->email }}"/>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            @error('account_not_exists')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-outline mb-4">
            <label class="form-label" for="password">{{ __('login.psw') }} :</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg" value="{{ $cookie_login_data->password }}"/>
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex justify-content-around align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me"/>
                <label class="form-check-label" for="remember_me" >{{ __('login.check') }}</label>
            </div>
             <a href="{{ route('forgot_password') }}">{{__('login.forgotpassword')}}</a>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">{{ __('login.login') }}</button>

        <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">{{ __('login.or') }}</p>
        </div>
        <a href="{{ route('signup') }}"
            class="btn btn-outline-success btn-lg btn-block w-100">{{ __('login.create_acc') }}</a>

        {{--
    <a class="btn btn-primary btn-lg btn-block w-100" style="background-color: #3b5998"
        href="#!" role="button">
        <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
    </a>
    <a class="btn btn-primary btn-lg btn-block w-100 mt-2" style="background-color: #55acee"
        href="#!" role="button">
        <i class="fab fa-twitter me-2"></i>Continue with Twitter</a> --}}
    </form>
@endsection
