
@extends('layouts.guest')
@section('auth-content')
    <div class="col-md-6">
        <div class="sign-in-from text-center">
            <a href="../index.html" class="d-inline-flex align-items-center justify-content-center gap-2">
                <svg width="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.67733 9.50001L7.88976 20.2602C9.81426 23.5936 14.6255 23.5936 16.55 20.2602L22.7624 9.5C24.6869 6.16666 22.2813 2 18.4323 2H6.00746C2.15845 2 -0.247164 6.16668 1.67733 9.50001ZM14.818 19.2602C13.6633 21.2602 10.7765 21.2602 9.62181 19.2602L9.46165 18.9828L9.46597 18.7275C9.48329 17.7026 9.76288 16.6993 10.2781 15.8131L12.0767 12.7195L14.1092 16.2155C14.4957 16.8803 14.7508 17.6132 14.8607 18.3743L14.9544 19.0239L14.818 19.2602ZM16.4299 16.4683L19.3673 11.3806C18.7773 11.5172 18.172 11.5868 17.5629 11.5868H13.7316L15.8382 15.2102C16.0721 15.6125 16.2699 16.0335 16.4299 16.4683ZM20.9542 8.63193L21.0304 8.5C22.1851 6.5 20.7417 4 18.4323 4H17.8353L17.1846 4.56727C16.6902 4.99824 16.2698 5.50736 15.9402 6.07437L13.8981 9.58676H17.5629C18.4271 9.58676 19.281 9.40011 20.0663 9.03957L20.9542 8.63193ZM14.9554 4C14.6791 4.33499 14.4301 4.69248 14.2111 5.06912L12.0767 8.74038L10.0324 5.22419C9.77912 4.78855 9.48582 4.37881 9.15689 4H14.9554ZM6.15405 4H6.00746C3.69806 4 2.25468 6.50001 3.40938 8.50001L3.4915 8.64223L4.37838 9.04644C5.15962 9.40251 6.00817 9.58676 6.86672 9.58676H10.2553L8.30338 6.22943C7.9234 5.57587 7.42333 5.00001 6.8295 4.53215L6.15405 4ZM5.07407 11.3833L7.88909 16.2591C8.05955 15.7565 8.28025 15.2702 8.54905 14.8079L10.4218 11.5868H6.86672C6.26169 11.5868 5.66037 11.5181 5.07407 11.3833Z"
                        fill="currentColor"></path>
                </svg>
                <h2 class="logo-title" data-setting="app_name">SocialV</h2>
            </a>
            <p class="mt-3 font-size-16">Welcome to socialV, a platform to connect with<br> the social world</p>
            <form class="mt-5" method="POST" action="{{ route('register') }}">
                @csrf
                <div class=" form-group text-start">
                    <h6 class="form-label fw-bold">Name</h6>
                    <input type="text" class="form-control mb-0 {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="Full Name" value="{{ old('name') }}" name="name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class=" form-group text-start">
                    <h6 class="form-label fw-bold">Username</h6>
                    <input type="text" class="form-control mb-0 {{ $errors->has('username') ? 'is-invalid' : '' }}"
                        placeholder="username" value="{{ old('username') }}" name="username">
                    @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group text-start">
                    <h6 class="form-label fw-bold">Email Address</h6>
                    <input type="email" class="form-control mb-0 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        placeholder="Enter You Email" value="{{ old('email') }}" name="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group text-start">
                    <h6 class="form-label fw-bold">Enter Your Phone</h6>
                    <input type="text" class="form-control mb-0 {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                        placeholder="Enter Your Phone" value="{{ old('phone') }}" name="phone">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group text-start">
                    <h6 class="form-label fw-bold">Designation</h6>
                    <select name="designation_id" id="designation" class="form-select {{ $errors->has('designation_id') ? 'is-invalid' : '' }}">
                        <option value="">Select Designation</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}" >
                                {{ $designation->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('designation_id')
                    <div class="invalid-feedback d-block text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group text-start">
                    <h6 class="form-label fw-bold">Password</h6>
                    <input type="password" class="form-control mb-0 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Password" name="password">

                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif

                </div>
                <div class="form-group text-start">
                    <h6 class="form-label fw-bold">Password Confirmation</h6>
                    <input type="password"
                        class="form-control mb-0 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                        placeholder="Password Confirmation" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-4 fw-semibold text-uppercase w-100">sign
                    up</button>
                <h6 class="mt-5">Already Have An Account ? <a href="{{ route('login') }}">Login</a></h6>
            </form>
        </div>
    </div>
    </div>
@endsection
