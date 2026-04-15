<div class="page-wrapper">
    <!-- Modern Header -->
    <div class="page-header d-print-none mb-4">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle text-uppercase fw-bold text-muted small mb-1">Business Network</div>
                    <h2 class="page-title fw-black h1">Strategic Partners</h2>
                    <p class="text-secondary mt-1">Manage and monitor institutional collaborations and roles.</p>
                </div>
                <div class="col-auto ms-auto">
                    @can('partner-create')
                    <button type="button" class="btn btn-primary d-none d-sm-inline-block rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#createPartnerModal">
                        <i class="ti ti-plus me-1"></i> Add New Partner
                    </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 16px;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-mobile-md card-table" id="partner-table">
                            <thead>
                                <tr class="bg-primary-lt">
                                    <th class="ps-4 py-3 fw-bold text-primary text-uppercase small" style="letter-spacing: 0.05em;">Partner Identity</th>
                                    <th class="py-3 fw-bold text-primary text-uppercase small" style="letter-spacing: 0.05em;">Company Profile</th>
                                    <th class="py-3 fw-bold text-primary text-uppercase small" style="letter-spacing: 0.05em;">Contact Info</th>
                                    <th class="w-1 no-sort pe-4 py-3 fw-bold text-primary text-uppercase small text-end" style="letter-spacing: 0.05em;">Management</th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @foreach($partners as $partner)
                                    <tr class="transition-all">
                                        <td class="ps-4 py-3" data-label="Partner">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md me-3 rounded-circle shadow-sm border border-2 border-white" 
                                                     style="background-image: url({{ $partner->image ? asset('uploads/partner/' . $partner->image) : asset('assets/admin/img/default-avatar.png') }}); width: 45px; height: 45px;">
                                                </div>
                                                <div class="flex-fill">
                                                    <div class="fw-bold text-dark fs-3">{{ "$partner->first_name $partner->last_name" }}</div>
                                                    <div class="text-muted small">ID: #PRT-{{ str_pad($partner->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3" data-label="Profile">
                                            <div class="fw-bold text-dark">{{ $partner->company }}</div>
                                            <div class="mt-1">
                                                <span class="badge bg-blue-lt px-2 py-1 rounded-pill fw-semibold" style="font-size: 0.7rem;">
                                                    <i class="ti ti-briefcase me-1"></i>{{ $partner->designation->title ?? 'Executive' }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-3" data-label="Contact">
                                            <div class="text-dark small mb-1"><i class="ti ti-mail me-2 text-primary opacity-50"></i>{{ $partner->email }}</div>
                                            <div class="text-muted extra-small"><i class="ti ti-map-pin me-2 text-secondary opacity-50"></i>{{ Str::limit($partner->address, 25) ?: 'Global Head office' }}</div>
                                        </td>
                                        <td class="pe-4 py-3 text-end">
                                            <div class="dropdown">
                                                <button class="btn btn-icon btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-2"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3">
                                                    @can('partner-edit')
                                                    <a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $partner->id }}">
                                                        <i class="ti ti-edit me-2 text-primary"></i> Edit Profile
                                                    </a>
                                                    @endcan
                                                    <div class="dropdown-divider"></div>
                                                    @can('partner-delete')
                                                    <form action="{{ route('admin.partner.destroy', $partner->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Archive this partner?')" class="dropdown-item text-danger py-2">
                                                            <i class="ti ti-trash me-2"></i> Delete Record
                                                        </button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </div>
                                            @include('components.partner-edit-modal')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        .transition-all { transition: all 0.2s ease; }
        #partner-table tbody tr:hover { background-color: #f8fafc !important; transform: scale(1.001); box-shadow: inset 4px 0 0 #206bc4; }
        .dataTables_wrapper .dataTables_filter { margin: 1.5rem; }
        .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin: 1.5rem; }
        #partner-table_filter input { 
            border-radius: 12px; 
            padding: 10px 20px; 
            border: 1px solid #e2e8f0; 
            background: #f8fafc;
            min-width: 300px;
            font-size: 0.9rem;
        }
        #partner-table_filter input:focus { 
            background: #fff;
            border-color: #206bc4;
            box-shadow: 0 4px 12px rgba(32, 107, 196, 0.08);
        }
        .extra-small { font-size: 0.75rem; }
        .dataTables_length select, #custom-sort-order, #user-sort-order, #post-sort-order {
            border-radius: 8px;
            padding: 5px 12px;
            border: 1px solid #d1d5db;
            background-color: #ffffff;
            color: #1f2937;
            font-weight: 500;
            margin: 0 5px;
            transition: all 0.2s;
        }
        .dataTables_length select:hover, #custom-sort-order:hover {
            border-color: #3b82f6;
            background-color: #f9fafb;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#partner-table').DataTable({
                "pageLength": 10,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search by name, company or email...",
                    "paginate": {
                        "previous": "<i class='ti ti-chevron-left'></i>",
                        "next": "<i class='ti ti-chevron-right'></i>"
                    }
                },
                "dom": '<"d-flex justify-content-between align-items-center p-3" <"d-flex align-items-center" l <"#partner-sort-wrapper" >> f>t<"d-flex justify-content-between align-items-center p-3"ip>',
                "initComplete": function() {
                    $('#partner-sort-wrapper').html(`
                        <div class="ms-3 d-flex align-items-center">
                            <span class="fw-bold text-dark small me-2 d-none d-md-inline">Sort:</span>
                            <select id="custom-sort-order" class="form-select form-select-sm shadow-sm" style="width: 140px;">
                                <option value="asc">Oldest First</option>
                                <option value="desc" selected>Newest First</option>
                            </select>
                        </div>
                    `);
                    
                    $('#custom-sort-order').on('change', function() {
                        const order = $(this).val();
                        $('#partner-table').DataTable().order([0, order]).draw();
                    });
                }
            });
            // Set initial order to newest first (assuming index 0 is SL/ID, usually we want DESC for newest)
            $('#partner-table').DataTable().order([0, 'desc']).draw();
        });
    </script>
@endpush