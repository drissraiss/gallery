{{-- <!DOCTYPE html>
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
    <div class="bg-white container">
        

        <!-- Session Status -->
        <div class="font-medium text-sm text-green-600 dark:text-green-400 mb-4">
            
        </div>

        <form method="POST" action="http://127.0.0.1:8000/forgot-password">
            <input type="hidden" name="_token" value="llnX7V18ItDcsKmSex87Ofnx0zI6hQaITNRnjIbS">
            <!-- Email Address -->
            <div>
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                    Email
                </label>
                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                    id="email" type="email" name="email" required="required" autofocus="autofocus">
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit"
                    class="btn btn-dark">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </div>
</body>
---------------------------- --}}
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
    <form action="{{ route('forgot_password_form') }}" method="POST">
        @csrf
        <div class="mb-4 text-sm fw-light">
            {{ __('forgot_password.nb') }}
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="email">{{ __('login.email') }} :</label>
            <input type="text" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}"/>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            @if(session()->get('success_emailed'))
                <p class="text-success">{{ session('success_emailed') }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">{{ __('forgot_password.send') }}</button>
    </form>
    <div class="text-center mt-3">
        <a href="./" >{{ __('forgot_password.home') }}</a>
    </div>

@endsection
