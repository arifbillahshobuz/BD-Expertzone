@extends('admin.layout.layout')

@section('title', 'Assign Role to User')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single { height: 38px; border: 1px solid #e6e7e9; border-radius: 4px; }
        .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 38px; }
        .select2-container--default .select2-selection--single .select2-selection__arrow { height: 36px; }
        .select2-container { width: 100% !important; }
    </style>
@endpush

@section('content')
<div class="page-wrapper">
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Assign Roles to User</h2>
                <div class="text-muted mt-1">Grant administrative or moderation privileges to specific users</div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('admin.roles.assign.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Select User</label>
                                <select id="user-select" name="user_id" class="form-control" required>
                                    <option value="">Search for user by name or email...</option>
                                </select>
                                <small class="text-muted">Type at least 2 characters to start searching.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">Assign Roles</label>
                                <div class="form-selectgroup">
                                    @foreach($roles as $role)
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label text-capitalize">{{ $role->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                <small class="text-muted">You can select multiple roles for a single user.</small>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-shield-check me-1"></i> Apply Role Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user-select').select2({
                ajax: {
                    url: '{{ route('admin.users.search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return { term: params.term };
                    },
                    processResults: function (data) {
                        return { results: data };
                    },
                    cache: true
                },
                minimumInputLength: 2,
                placeholder: 'Search for user...',
                allowClear: true
            });
        });
    </script>
@endpush
