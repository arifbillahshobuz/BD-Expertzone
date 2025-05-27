@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <form class="card" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Edit Profile') }}</h3>
                        <div class="row row-cards">
{{--                            <div class="col-md-12">--}}
{{--                                <x-admin.image-preview :src="asset(auth('admin')->user()->avatar)" height="128px" width="128px" />--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12">--}}
{{--                                <x-admin.input-text type="file" name="avatar" :label="__('Avatar')" />--}}
{{--                            </div>--}}

                            <div class="col-md-6">
                                <label class="form-label">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name  }}" placeholder="{{ __('Name') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">{{ __('Email') }}</label>
                                <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}" placeholder="{{ __('Email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                    </div>
                </form>

                <form class="card mt-4" action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Update Password') }}</h3>
                        <div class="row row-cards">

                            <div class="col-md-12">
                                <label for="password">{{__('Current Password')}}</label>
                                <input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" >
                            </div>
                            <div class="col-md-6">
                                <label for="password">{{__('New Password')}}</label>
                                <input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" >
                            </div>

                            <div class="col-md-6">
                                <label for="password">{{__('Confirm Password')}}</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}" >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
