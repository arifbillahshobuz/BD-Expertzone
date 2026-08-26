@extends('admin.layout.layout')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <!-- Stats Cards -->
            <div class="row row-cards mb-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm border-0 shadow-sm overflow-hidden">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-primary-lt avatar avatar-md rounded-circle">
                                        <i class="ti ti-users fs-2"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-uppercase text-muted fw-bold small">Total Users</div>
                                    <div class="h2 mb-0 fw-black">{{ number_format($total_user) ?? 'N\A'}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm border-0 shadow-sm overflow-hidden">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-success-lt avatar avatar-md rounded-circle">
                                        <i class="ti ti-notes fs-2"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-uppercase text-muted fw-bold small">Total Posts</div>
                                    <div class="h2 mb-0 fw-black">{{ number_format($total_posts)  ?? 'N\A'}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="card card-sm border-0 shadow-sm overflow-hidden">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-warning-lt avatar avatar-md rounded-circle">
                                        <i class="ti ti-hand-shake fs-2"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-uppercase text-muted fw-bold small">Active Partners</div>
                                    <div class="h2 mb-0 fw-black">{{ number_format($total_partners)  ?? 'N\A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <!-- Recent Users Table -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header border-0 bg-transparent py-3">
                            <h3 class="card-title fw-bold">
                                <i class="ti ti-user-plus me-2 text-primary"></i>Recent Users
                            </h3>
                            <div class="card-actions">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-ghost-primary">View All</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name  ?? 'N\A'}}
                                        </td>
                                        <td>
                                            {{ $user->email  ?? 'N\A'}}
                                        </td>
                                        <td>
                                            {{ $user->created_at?->diffForHumans() ?? 'N/A' }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">
                                            No users found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Recent Partners Table -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header border-0 bg-transparent py-3">
                            <h3 class="card-title fw-bold">
                                <i class="ti ti-building-community me-2 text-success"></i>Recent Partners
                            </h3>
                            <div class="card-actions">
                                <a href="{{ route('admin.partner.index') }}" class="btn btn-sm btn-ghost-success">View All</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Partner</th>
                                        <th>Designation</th>
                                        <th>Company</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_partners as $partner)
                                    <tr>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                <!-- <span class="avatar avatar-sm me-2 rounded-circle" style="background-image: url({{ $partner->image ? asset('uploads/partner/' . $partner->image) : '' }})"></span> -->
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $partner->first_name  ?? 'N\A'}} {{ $partner->last_name  ?? 'N\A'}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-green-lt">{{ $partner->designation?->title ?? 'N/A' }}</span></td>
                                        <td>{{ $partner->company  ?? 'N\A'}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No partners found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Extra Stats Small Cards -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 text-center">
                            <div class="text-muted mb-2 small text-uppercase fw-bold">Total Designations</div>
                            <div class="h3 mb-0">{{ $total_designations  ?? 'N\A'}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 text-center">
                            <div class="text-muted mb-2 small text-uppercase fw-bold">Post Categories</div>
                            <div class="h3 mb-0">{{ $total_categories  ?? 'N\A' }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 text-center">
                            <div class="text-muted mb-2 small text-uppercase fw-bold">Server Load</div>
                            <div class="h3 mb-0 text-success">Normal</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 text-center">
                            <div class="text-muted mb-2 small text-uppercase fw-bold">System Status</div>
                            <div class="h3 mb-0 text-primary">Active</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright &copy; {{ date('Y') }}
                            <a href="." class="link-secondary"></a>.
                            All rights reserved.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
@endpush