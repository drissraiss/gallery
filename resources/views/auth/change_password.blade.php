@extends('auth.layouts.app')
@section('form')
    <form action="{{ route('try_changepassword') }}" method="POST">
        @csrf
        <h3 class="mb-5">{{__('forgot_password.create_new_pass')}}</h3>
        <input type="hidden" name="reset_password" value="{{ $reset_password }}">
        <div class="form-outline mb-4 d-none" >
            <label class="form-label" for="email">{{ __('signup.email') }} :</label>
            <input type="text" id="email" name="email" class="form-control form-control-lg" readonly style="cursor: no-drop;"
                value="{{ $email }}" />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="password">{{ __('forgot_password.new_psw') }} :</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg" />
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="password_confirmation">{{ __('signup.psw_conf') }} :</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control form-control-lg"  />
            @error('password_confirmation') 
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success btn-lg btn-block w-100">{{ __('forgot_password.update_password') }}</button>
    </form>
    <div class="text-center mt-3">
        <a href="./" >{{ __('forgot_password.home') }}</a>
    </div>
@endsection
<script>
    function color_black(target){
        target.classList.remove("text-danger");
    };
</script>
