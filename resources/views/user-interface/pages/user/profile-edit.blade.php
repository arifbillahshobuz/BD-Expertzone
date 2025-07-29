@extends('user-interface.layout.layout')
@section('title', 'Edit Profile')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="iq-edit-list">
                        <ul class="iq-edit-profile row nav nav-pills" role="tablist">
                            <li class="col-md-3 p-0">
                                <a class="nav-link {{ session('tab') == 'personal-information' || !session('tab') ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#personal-information" role="tab">
                                    Personal Information
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link {{ session('tab') == 'chang-pwd' ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#chang-pwd" role="tab">
                                    Change Password
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link {{ session('tab') == 'emailandsms' ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#emailandsms" role="tab">
                                    Email and SMS
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link {{ session('tab') == 'manage-contact' ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#manage-contact" role="tab">
                                    Manage Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade {{ !session('tab') || session('tab') == 'personal-information' ? 'active show' : '' }}"
                        id="personal-information" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.profile-update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row align-items-center">
                                        <div class="col-md-12">
                                            <div class="profile-img-edit">
                                                <img class="profile-pic" id="avatar-preview"
                                                    src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') ?? '' }}"
                                                    width="150px" height="150px" alt="profile-pic" loading="lazy">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ auth()->user()->name ?? '' }}">

                                            <small class="text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="username" class="form-label">User Name:</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ auth()->user()->username ?? '' }}">

                                            <small class="text-danger">
                                                @error('username')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="blood_group" class="form-label">Blood Group:</label>
                                            <input type="text"
                                                class="form-control @error('blood_group') is-invalid @enderror"
                                                id="blood_group" name="blood_group"
                                                value="{{ auth()->user()->profile->blood_group ?? '' }}">
                                            <small class="text-danger">
                                                @error('blood_group')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label d-block">Gender:</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input " type="radio" name="gender"
                                                    id="inlineRadio10" value="male"
                                                    {{ old('gender', auth()->user()->profile->gender ?? '') == 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio10">Male</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio11" value="female"
                                                    {{ old('gender', auth()->user()->profile->gender ?? '') == 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio11">Female</label>
                                            </div>

                                            <span class="text-danger">
                                                @error('gender')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>



                                        <div class="form-group col-sm-6">
                                            <label for="dob" class="form-label">Date Of Birth:</label>
                                            <input class="form-control @error('date_of_birth') is-invalid @enderror"
                                                id="dob" name="date_of_birth" type="date"
                                                value="{{ old('date_of_birth') ?? (auth()->user()->profile->date_of_birth ?? '') }}">

                                            <small class="text-danger">
                                                @error('date_of_birth')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="language" class="form-label">Language:</label>
                                            <input class="form-control @error('language') is-invalid @enderror"
                                                id="language" name="language"
                                                value="{{ old('language') ?? (auth()->user()->profile->language ?? '') }}"
                                                placeholder="English, Bengali, Hindi">

                                            <small class="text-danger">
                                                @error('language')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="education" class="form-label">Education:</label>
                                            <input class="form-control @error('education') is-invalid @enderror"
                                                id="education" name="education"
                                                value="{{ old('education') ?? (auth()->user()->profile->education ?? '') }}">

                                            <small class="text-danger">
                                                @error('education')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="hobby" class="form-label">Hobby:</label>
                                            <input class="form-control @error('hobby') is-invalid @enderror"
                                                id="hobby" name="hobby"
                                                value="{{ old('hobby') ?? (auth()->user()->profile->hobby ?? '') }}">
                                            <small class="text-danger">
                                                @error('hobby')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group">
                                            <label for="cv" class="form-label">Your CV (PDF):</label>
                                            <input type="file" class="form-control" id="cv" name="cv"
                                                accept=".pdf">
                                            <small class="text-danger">
                                                @error('cv')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                            <div class="mt-2" id="cv-filename-preview">
                                                @if (Auth::user()->profile && Auth::user()->profile->cv)
                                                    Currently: <a
                                                        href="{{ asset('storage/' . Auth::user()->profile->cv ?? '') }}"
                                                        target="_blank">{{ basename(Auth::user()->profile->cv) }}</a>
                                                @else
                                                    No CV uploaded.
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="designation_id" class="form-label">Designation:</label>
                                            <select name="designation_id" id="designation_id" class="form-select">
                                                @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}"
                                                        {{ old('designation_id') == $designation->id ? 'selected' : '' ?? auth()->user()->profile->designation_id == $designation->id }}>
                                                        {{ $designation->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">
                                                @error('designation_id')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Relationship:</label>
                                            <select class="form-select @error('relationship') is-invalid @enderror"
                                                name="relationship">
                                                <option value="">Select</option>
                                                <option value="unmarried"
                                                    {{ old('relationship') == 'unmarried' ? 'selected' : '' ?? (auth()->user()->profile->relationship ?? '') }}>
                                                    Unmarried
                                                </option>
                                                <option value="married"
                                                    {{ old('relationship') == 'married' ? 'selected' : '' ?? (auth()->user()->profile->relationship ?? '') }}>
                                                    Married
                                                </option>
                                            </select>
                                            <small class="text-danger">
                                                @error('relationship')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class="form-label">Bio:</label>
                                            <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="5"
                                                style="line-height: 20px;">{{ old('bio') ?? (auth()->user()->profile->bio ?? '') }}</textarea>
                                            <small class="text-danger">
                                                @error('bio')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Present Address:</label>
                                            <textarea class="form-control" name="present_address" rows="3" style="line-height: 15px;">{{ auth()->user()->profile->present_address ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('present_address')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Permanent Address:</label>
                                            <textarea class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address"
                                                rows="3" style="line-height: 15px;">{{ auth()->user()->profile->permanent_address ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('permanent_address')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button type="reset" class="btn btn-danger-subtle">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade {{ session('tab') == 'chang-pwd' ? 'active show' : '' }}" id="chang-pwd"
                        role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.change-password') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cpass" class="form-label">Current Password:</label>
                                        <input type="Password" class="form-control" id="cpass"
                                            name="current_password" value="">
                                        <small class="text-danger">
                                            @error('current_password')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="npass" class="form-label">New Password:</label>
                                        <input type="Password" class="form-control" id="npass" name="password"
                                            value="">
                                        <small class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </small>

                                    </div>
                                    <div class="form-group">
                                        <label for="vpass" class="form-label">Confirm Password:</label>
                                        <input type="Password" class="form-control" id="vpass"
                                            name="password_confirmation" value="">
                                        <small class="text-danger">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button type="reset" class="btn btn-danger-subtle">cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Email and SMS</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                        <div class="col-md-9 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked11"
                                                checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked11">Checked switch
                                                checkbox input</label>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                        <div class="col-md-9 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked12"
                                                checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked12">Checked switch
                                                checkbox input</label>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="npass">When To Email</label>
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault12">
                                                <label class="form-check-label" for="flexCheckDefault12">
                                                    You have new notifications.
                                                </label>
                                            </div>
                                            <div class="form-check d-block">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="email02">
                                                <label class="form-check-label" for="email02">You're sent a direct
                                                    message</label>
                                            </div>
                                            <div class="form-check d-block">
                                                <input type="checkbox" class="form-check-input" id="email03"
                                                    checked="">
                                                <label class="form-check-label" for="email03">Someone adds you as a
                                                    connection</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="email04">
                                                <label class="form-check-label" for="email04">
                                                    Upon new order.
                                                </label>
                                            </div>
                                            <div class="form-check d-block">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="email05">
                                                <label class="form-check-label" for="email05">New membership
                                                    approval</label>
                                            </div>
                                            <div class="form-check d-block">
                                                <input type="checkbox" class="form-check-input" id="email06"
                                                    checked="">
                                                <label class="form-check-label" for="email06">Member registration</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button type="reset" class="btn btn-danger-subtle">cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Manage Contact</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="cno" class="form-label">Contact Number:</label>
                                        <input type="text" class="form-control" id="cno"
                                            value="001 2536 123 458">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="text" class="form-control" id="email"
                                            value="Bnijone@demo.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="url" class="form-label">Url:</label>
                                        <input type="text" class="form-control" id="url"
                                            value="https://getbootstrap.com">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button type="reset" class="btn btn-danger-subtle">cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
