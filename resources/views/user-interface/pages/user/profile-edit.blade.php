@extends('user-interface.layout.layout')
@section('title', 'Edit Profile')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="iq-edit-list">
                        <ul class="iq-edit-profile row nav nav-pills" role="tablist">
                            <li class="col-md-6 p-0">
                                <a class="nav-link {{ session('tab') == 'personal-information' || !session('tab') ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#personal-information" role="tab">
                                    Personal Information
                                </a>
                            </li>
                            <li class="col-md-6 p-0">
                                <a class="nav-link {{ session('tab') == 'chang-pwd' ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#chang-pwd" role="tab">
                                    Change Password
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
                                                    src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                    width="150px" height="150px" alt="profile-pic" loading="lazy">
                                                <div class="p-image mt-2">
                                                    <input class="file-upload @error('avatar') is-invalid @enderror"
                                                        type="file" name="avatar" accept="image/*" id="avatar-input" />
                                                    <label for="avatar-input" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-alt"></i> Update Avatar
                                                    </label>
                                                    <small class="text-danger d-block">
                                                        @error('avatar')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                                </div>
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
                                            <label for="cv" class="form-label">
                                                @if (Auth::user()->profile && Auth::user()->profile->cv)
                                                    Upload New CV (PDF) - Optional:
                                                @else
                                                    Your CV (PDF) - Required:
                                                @endif
                                            </label>

                                            <!-- Current CV Display -->
                                            @if (Auth::user()->profile && Auth::user()->profile->cv)
                                                <div class="current-cv-section mb-3 p-3 border rounded bg-light">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-file-pdf text-danger fs-3 me-2"></i>
                                                            <div>
                                                                <h6 class="mb-1">Current CV</h6>
                                                                <small
                                                                    class="text-muted">{{ basename(Auth::user()->profile->cv) }}</small>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="{{ asset(Auth::user()->profile->cv) }}"
                                                                target="_blank"
                                                                class="btn btn-outline-primary btn-sm me-2">
                                                                <i class="fas fa-eye"></i> View
                                                            </a>
                                                            <a href="{{ route('user.cv.download') }}"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fas fa-download"></i> Download
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- CV Upload Input -->
                                            <input type="file" class="form-control @error('cv') is-invalid @enderror"
                                                id="cv" name="cv" accept=".pdf">
                                            @if (Auth::user()->profile && Auth::user()->profile->cv)
                                                <small class="form-text text-muted">Upload a new CV to replace the current
                                                    one.
                                                    Leave empty to keep current CV. Only PDF files are allowed.</small>
                                            @else
                                                <small class="form-text text-muted">Please upload your CV. Only PDF files
                                                    are allowed.</small>
                                            @endif

                                            <small class="text-danger">
                                                @error('cv')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                            <!-- New CV Preview -->
                                            <div class="mt-2 d-none" id="cv-preview-section">
                                                <div class="p-3 border rounded bg-info bg-opacity-10">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-file-pdf text-info fs-3 me-2"></i>
                                                        <div>
                                                            <h6 class="mb-1 text-info">New CV Selected</h6>
                                                            <small class="text-muted" id="cv-filename-preview"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="designation_id" class="form-label">Designation:</label>
                                            <select name="designation_id" id="designation_id"
                                                class="form-select @error('designation_id') is-invalid @enderror">
                                                <option value="">Select Designation</option>
                                                @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}"
                                                        {{ (old('designation_id') ?? (auth()->user()->profile->designation_id ?? '')) == $designation->id ? 'selected' : '' }}>
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
                                                <option value="">Select Relationship Status</option>
                                                <option value="unmarried"
                                                    {{ (old('relationship') ?? (auth()->user()->profile->relationship ?? '')) == 'unmarried' ? 'selected' : '' }}>
                                                    Unmarried
                                                </option>
                                                <option value="married"
                                                    {{ (old('relationship') ?? (auth()->user()->profile->relationship ?? '')) == 'married' ? 'selected' : '' }}>
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
                                            <textarea class="form-control @error('present_address') is-invalid @enderror" name="present_address" rows="3"
                                                style="line-height: 15px;">{{ old('present_address') ?? (auth()->user()->profile->present_address ?? '') }}</textarea>
                                            <small class="text-danger">
                                                @error('present_address')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Permanent Address:</label>
                                            <textarea class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address"
                                                rows="3" style="line-height: 15px;">{{ old('permanent_address') ?? (auth()->user()->profile->permanent_address ?? '') }}</textarea>
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

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        // Avatar preview functionality
        document.getElementById('avatar-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // CV file preview
        document.getElementById('cv').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('cv-filename-preview');
            if (file) {
                preview.innerHTML = `Selected: <strong>${file.name}</strong>`;
            } else {
                preview.innerHTML =
                    '@if (Auth::user()->profile && Auth::user()->profile->cv) Currently: <a href="{{ asset('storage/' . Auth::user()->profile->cv) }}" target="_blank">{{ basename(Auth::user()->profile->cv) }}</a> @else No CV uploaded. @endif';
            }
        });

        // Form validation
        document.querySelector('form[action="{{ route('user.profile-update') }}"]').addEventListener('submit', function(
            e) {
            let isValid = true;
            const requiredFields = ['name', 'username'];

            requiredFields.forEach(function(fieldName) {
                const field = document.getElementById(fieldName);
                if (field && !field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                    // Add error message if not exists
                    if (!field.nextElementSibling || !field.nextElementSibling.classList.contains(
                            'text-danger')) {
                        const errorMsg = document.createElement('small');
                        errorMsg.className = 'text-danger';
                        errorMsg.textContent =
                            `${fieldName.charAt(0).toUpperCase() + fieldName.slice(1)} is required.`;
                        field.parentNode.appendChild(errorMsg);
                    }
                } else if (field) {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                const firstError = document.querySelector('.is-invalid');
                if (firstError) {
                    firstError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    firstError.focus();
                }
            }
        });

        // Remove validation error on input
        document.querySelectorAll('input, select, textarea').forEach(function(element) {
            element.addEventListener('input', function() {
                this.classList.remove('is-invalid');
                // Remove custom error messages
                const nextElement = this.nextElementSibling;
                if (nextElement && nextElement.classList.contains('text-danger') && nextElement.tagName ===
                    'SMALL') {
                    nextElement.remove();
                }
            });
        });

        // Handle tab switching with session state
        @if (session('tab'))
            // Auto-switch to the tab that has validation errors
            const errorTab = '{{ session('tab') }}';
            const tabLink = document.querySelector(`a[href="#${errorTab}"]`);
            if (tabLink) {
                const tab = new bootstrap.Tab(tabLink);
                tab.show();
            }
        @endif
    </script>
@endsection
