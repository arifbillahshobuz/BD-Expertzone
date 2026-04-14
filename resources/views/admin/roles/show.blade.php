@extends('admin.layout.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Show Role: {{ $role->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        {{ $role->name }}
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Permissions:</label>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="badge bg-primary text-primary-fg">{{ $v->name }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
