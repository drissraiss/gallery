@extends('auth.layouts.app')
@section('form')
    <form action="{{ route('try_signup') }}" method="POST">
        @csrf
        <div class="form-outline mb-4">
            <label class="form-label" for="username">{{ __('signup.username') }} :</label>
            <input type="text" id="username" name="username" class="form-control form-control-lg"
                value="{{ old('username') }}" />
            @error('username')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="email">{{ __('signup.email') }} :</label>
            <input type="text" id="email" name="email" class="form-control form-control-lg"
                value="{{ old('email') }}" />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="password">{{ __('signup.psw') }} :</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg" />
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="password_confirmation">{{ __('signup.psw_conf') }} :</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control form-control-lg" />
            @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="conditions" id="conditions" />
                
                <label class="form-check-label @error('conditions') text-danger @enderror"  onclick="color_black(this)" for="conditions">{{ __('signup.agree_inpt') }} <a
                        href="/termsAndConditions">{{ __('signup.term') }}</a></label>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-lg btn-block w-100">{{ __('signup.signup') }}</button>

        <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">{{ __('signup.or') }}</p>
        </div>
        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg btn-block w-100">{{ __('signup.login') }}</a>
    </form>
@endsection
<script>
    function color_black(target){
        target.classList.remove("text-danger");
    };
</script>
