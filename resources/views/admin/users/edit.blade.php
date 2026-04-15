@extends('admin.layout.layout')

@section('title', 'Edit User - ' . $user->name)

@section('content')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit User Account
                    </h2>
                    <div class="text-muted mt-1">Modifying profile for {{ $user->name }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <form action="{{ route('admin.users.update', $user->username) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Full Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Username</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username', $user->username) }}" required>
                                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Email Address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $user->phone) }}">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Account Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="banned" {{ old('status', $user->status) == 'banned' ? 'selected' : '' }}>
                                        Banned</option>
                                </select>
                                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Assign Roles</label>
                                <div class="form-selectgroup">
                                    @foreach($roles as $role)
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                                class="form-selectgroup-input" {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                                            <span class="form-selectgroup-label text-capitalize">{{ $role->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                <small class="text-muted">Select one or more roles for this user.</small>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Update Avatar</label>
                                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                                @if($user->avatar)
                                    <small class="text-muted">Current: <a href="{{ asset($user->avatar) }}" target="_blank">View
                                            File</a></small>
                                @endif
                                @error('avatar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="hr-text">Security (Optional)</div>

                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Leave blank to keep current">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Repeat new password">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-check me-1"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection