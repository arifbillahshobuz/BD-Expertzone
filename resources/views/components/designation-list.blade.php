<div class="page-wrapper">
    <div class="page-header d-print-none mb-4">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle text-uppercase fw-bold text-muted small mb-1">Human Resources</div>
                    <h2 class="page-title fw-black h1">Job Designations</h2>
                    <p class="text-secondary mt-1">Define and organize professional roles across the hierarchy.</p>
                </div>
                <div class="col-auto ms-auto">
                    @can('designation-create')
                    <button type="button" class="btn btn-success d-none d-sm-inline-block rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#createDesignationModal">
                        <i class="ti ti-briefcase me-1"></i> New Designation
                    </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-hover" id="designation-table">
                            <thead>
                                <tr class="bg-success-lt">
                                    <th class="ps-4 py-3 fw-bold text-success text-uppercase small" style="letter-spacing: 0.05em;">Role Title</th>
                                    <th class="py-3 fw-bold text-success text-uppercase small" style="letter-spacing: 0.05em;">System Status</th>
                                    <th class="py-3 fw-bold text-success text-uppercase small" style="letter-spacing: 0.05em;">Created Date</th>
                                    <th class="w-1 no-sort pe-4 py-3 fw-bold text-success text-uppercase small text-end">Action Center</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($designations as $designation)
                                    <tr class="transition-all">
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-shape bg-green-lt rounded-3 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <i class="ti ti-id-badge-2 fs-2"></i>
                                                </div>
                                                <div class="fw-bold text-dark fs-3">{{ $designation->title }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-outline text-success fw-bold px-3 rounded-pill">Active</span>
                                        </td>
                                        <td class="text-muted small">
                                            <i class="ti ti-calendar-event me-1"></i>{{ $designation->created_at ? $designation->created_at->format('M d, Y') : 'N/A' }}
                                        </td>
                                        <td class="pe-4 text-end">
                                            <div class="btn-list justify-content-end">
                                                @can('designation-edit')
                                                <button type="button" class="btn btn-icon btn-ghost-success rounded-circle" data-bs-toggle="modal" data-bs-target="#editModal{{ $designation->id }}" title="Edit Role">
                                                    <i class="ti ti-edit fs-2"></i>
                                                </button>
                                                @endcan
                                                @can('designation-delete')
                                                <form action="{{ route('admin.designation.destroy', $designation->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Remove this designation from system?')" class="btn btn-icon btn-ghost-danger rounded-circle" title="Delete">
                                                        <i class="ti ti-trash fs-2"></i>
                                                    </button>
                                                </form>
                                                @endcan
                                            </div>
                                            @include('components.designation-edit-modal')
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
        #designation-table tr:hover { background-color: #f0fdf4 !important; }
        .dataTables_wrapper .dataTables_filter { margin: 1.5rem; }
        .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin: 1.5rem; }
        #designation-table_filter input { 
            border-radius: 12px; 
            padding: 10px 20px; 
            border: 1px solid #e2e8f0; 
            background: #f8fafc;
            min-width: 300px;
        }
        #designation-table_filter input:focus { 
            border-color: #2fb344;
            box-shadow: 0 4px 12px rgba(47, 179, 68, 0.08);
            background: #fff;
        }
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
            $('#designation-table').DataTable({
                "pageLength": 10,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search Designations...",
                    "paginate": { "previous": "<i class='ti ti-chevron-left'></i>", "next": "<i class='ti ti-chevron-right'></i>" }
                },
                "dom": '<"d-flex justify-content-between align-items-center p-3" <"d-flex align-items-center" l <"#designation-sort-wrapper" >> f>t<"d-flex justify-content-between align-items-center p-3"ip>',
                "initComplete": function() {
                    $('#designation-sort-wrapper').html(`
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
                        $('#designation-table').DataTable().order([0, order]).draw();
                    });
                }
            });
            $('#designation-table').DataTable().order([0, 'desc']).draw();
        });
    </script>
@endpush
