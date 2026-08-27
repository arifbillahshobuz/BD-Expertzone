@extends('layouts.guest')
@section('auth-content')
<div class="col-md-6" style="background-color: #313131; ">
    <div class="sign-in-from text-center">
        <a href="{{ route('home') }}" class="d-inline-flex align-items-center justify-content-center gap-2">
            @if(getSetting('app_logo'))
            <img src="{{ asset(getSetting('app_logo')) }}" class="img-fluid rounded" alt="logo" style="height: 60px;">
            @else
            <svg width="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1.67733 9.50001L7.88976 20.2602C9.81426 23.5936 14.6255 23.5936 16.55 20.2602L22.7624 9.5C24.6869 6.16666 22.2813 2 18.4323 2H6.00746C2.15845 2 -0.247164 6.16668 1.67733 9.50001ZM14.818 19.2602C13.6633 21.2602 10.7765 21.2602 9.62181 19.2602L9.46165 18.9828L9.46597 18.7275C9.48329 17.7026 9.76288 16.6993 10.2781 15.8131L12.0767 12.7195L14.1092 16.2155C14.4957 16.8803 14.7508 17.6132 14.8607 18.3743L14.9544 19.0239L14.818 19.2602ZM16.4299 16.4683L19.3673 11.3806C18.7773 11.5172 18.172 11.5868 17.5629 11.5868H13.7316L15.8382 15.2102C16.0721 15.6125 16.2699 16.0335 16.4299 16.4683ZM20.9542 8.63193L21.0304 8.5C22.1851 6.5 20.7417 4 18.4323 4H17.8353L17.1846 4.56727C16.6902 4.99824 16.2698 5.50736 15.9402 6.07437L13.8981 9.58676H17.5629C18.4271 9.58676 19.281 9.40011 20.0663 9.03957L20.9542 8.63193ZM14.9554 4C14.6791 4.33499 14.4301 4.69248 14.2111 5.06912L12.0767 8.74038L10.0324 5.22419C9.77912 4.78855 9.48582 4.37881 9.15689 4H14.9554ZM6.15405 4H6.00746C3.69806 4 2.25468 6.50001 3.40938 8.50001L3.4915 8.64223L4.37838 9.04644C5.15962 9.40251 6.00817 9.58676 6.86672 9.58676H10.2553L8.30338 6.22943C7.9234 5.57587 7.42333 5.00001 6.8295 4.53215L6.15405 4ZM5.07407 11.3833L7.88909 16.2591C8.05955 15.7565 8.28025 15.2702 8.54905 14.8079L10.4218 11.5868H6.86672C6.26169 11.5868 5.66037 11.5181 5.07407 11.3833Z"
                    fill="currentColor"></path>
            </svg>
            @endif
            <h2 class="logo-title text-color-white" data-setting="app_name">{{ getSetting('app_name', env('APP_NAME')) }}</h2>
        </a>
        <p class="mt-3 font-size-16 text-color-white">Welcome to {{ getSetting('app_name', env('APP_NAME')) }}</p>
        <p class="mt-3 font-size-16 text-color-white">We have sent a verification code to your email.<b> <span style="color: red;">Please check your inbox or spam</span> </b> and verify your account.</p>
    
        <div class="card">
            <form class="mt-5" method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <input hidden type="email" class="form-control mb-0" name="email"
                    value="{{ old('email', $request->email) }}">

                <div class="form-group text-start">
                    <h6 class="form-label fw-bold" style="margin-left:10px">Password</h6>

                    <div class="position-relative">
                        <input
                            type="password"
                            id="password"
                            class="form-control mb-0 pe-5 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Password"
                            name="password">

                        <span
                            id="togglePassword"
                            class="position-absolute"
                            style="
                right: 15px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                z-index: 10;
                font-size: 18px;
            ">👁</span>
                    </div>

                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>


                <div class="form-group text-start">
                    <h6 class="form-label fw-bold" style="margin-left:10px">Password Confirmation</h6>

                    <div class="position-relative">
                        <input
                            type="password"
                            id="password_confirmation"
                            class="form-control mb-0 pe-5 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                            placeholder="Password Confirmation"
                            name="password_confirmation">

                        <span
                            id="togglePasswordConfirmation"
                            class="position-absolute"
                            style="
                right: 15px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                z-index: 10;
                font-size: 18px;
            ">👁</span>
                    </div>

                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-4 fw-semibold text-uppercase w-100">Reset Password</button>
                <h6 class="mt-5 mb-5">Already Have An Account ? <a href="{{ route('login') }}">Login</a></h6>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');

        if (password.type === 'password') {
            password.type = 'text';
            this.textContent = '🙈';
        } else {
            password.type = 'password';
            this.textContent = '👁';
        }
    });

    document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
        const passwordConfirmation = document.getElementById('password_confirmation');

        if (passwordConfirmation.type === 'password') {
            passwordConfirmation.type = 'text';
            this.textContent = '🙈';
        } else {
            passwordConfirmation.type = 'password';
            this.textContent = '👁';
        }
    });
</script>
@endsection