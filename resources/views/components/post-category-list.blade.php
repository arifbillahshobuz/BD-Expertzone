<div class="page-wrapper">
    <div class="page-header d-print-none mb-4">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle text-uppercase fw-bold text-muted small mb-1">Content Management</div>
                    <h2 class="page-title fw-black h1">Post Categories</h2>
                    <p class="text-secondary mt-1">Organize your blog and social posts into dynamic categories.</p>
                </div>
                <div class="col-auto ms-auto">
                    @can('post-category-create')
                    <button type="button" class="btn btn-indigo d-none d-sm-inline-block rounded-pill px-4 shadow-sm text-white" data-bs-toggle="modal" data-bs-target="#createPostCategoryModal">
                        <i class="ti ti-folder-plus me-1"></i> New Category
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
                        <table class="table table-vcenter card-table table-hover" id="post-category-table">
                            <thead>
                                <tr class="bg-indigo-lt">
                                    <th class="ps-4 py-3 fw-bold text-indigo text-uppercase small" style="letter-spacing: 0.05em;">Category Name</th>
                                    <th class="py-3 fw-bold text-indigo text-uppercase small" style="letter-spacing: 0.05em;">Visibility</th>
                                    <th class="py-3 fw-bold text-indigo text-uppercase small" style="letter-spacing: 0.05em;">Metadata</th>
                                    <th class="w-1 no-sort pe-4 py-3 fw-bold text-indigo text-uppercase small text-end">Management</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($postCategories as $postCategory)
                                    <tr class="transition-all">
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-shape bg-indigo-lt rounded-circle me-3 d-flex align-items-center justify-content-center border border-indigo-lt" style="width: 42px; height: 42px;">
                                                    <i class="ti ti-category-2 fs-2 text-indigo"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark fs-3">{{ $postCategory->title }}</div>
                                                    <div class="text-secondary extra-small">{{ Str::slug($postCategory->title) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-purple-lt px-2 py-1 rounded-pill fw-bold">Public</span>
                                        </td>
                                        <td class="text-muted small">
                                            <div class="d-flex flex-column">
                                                <span><i class="ti ti-calendar-time me-1"></i>{{ $postCategory->created_at ? $postCategory->created_at->diffForHumans() : 'Date N/A' }}</span>
                                            </div>
                                        </td>
                                        <td class="pe-4 text-end">
                                            <div class="btn-list justify-content-end">
                                                @can('post-category-edit')
                                                <button type="button" class="btn btn-icon btn-ghost-indigo rounded-circle" data-bs-toggle="modal" data-bs-target="#editModal{{ $postCategory->id }}" title="Edit Category">
                                                    <i class="ti ti-settings fs-2"></i>
                                                </button>
                                                @endcan
                                                @can('post-category-delete')
                                                <button type="button" class="btn btn-icon btn-ghost-danger rounded-circle delete-category-btn" data-id="{{ $postCategory->id }}" title="Delete Category">
                                                    <i class="ti ti-trash fs-2"></i>
                                                </button>
                                                <form id="delete-form-{{ $postCategory->id }}" action="{{ route('admin.post.category.destroy', $postCategory->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endcan
                                            </div>
                                            @include('components.post-category-edit-modal')
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
        #post-category-table tr:hover { background-color: #f5f3ff !important; box-shadow: inset 4px 0 0 #4263eb; }
        .dataTables_wrapper .dataTables_filter { margin: 1.5rem; }
        .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin: 1.5rem; }
        #post-category-table_filter input { 
            border-radius: 12px; 
            padding: 10px 20px; 
            border: 1px solid #e2e8f0; 
            background: #f8fafc;
            min-width: 300px;
        }
        #post-category-table_filter input:focus { 
            border-color: #4263eb;
            box-shadow: 0 4px 12px rgba(66, 99, 235, 0.08);
            background: #fff;
        }
        .extra-small { font-size: 0.7rem; }
        .btn-indigo { background-color: #4263eb; border-color: #4263eb; }
        .btn-indigo:hover { background-color: #3b5bdb; border-color: #3b5bdb; }
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
            $('#post-category-table').DataTable({
                "pageLength": 10,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search Categories...",
                    "paginate": { "previous": "<i class='ti ti-chevron-left'></i>", "next": "<i class='ti ti-chevron-right'></i>" }
                },
                "dom": '<"d-flex justify-content-between align-items-center p-3" <"d-flex align-items-center" l <"#category-sort-wrapper" >> f>t<"d-flex justify-content-between align-items-center p-3"ip>',
                "initComplete": function() {
                    $('#category-sort-wrapper').html(`
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
                        $('#post-category-table').DataTable().order([0, order]).draw();
                    });
                }
            });
            $('#post-category-table').DataTable().order([0, 'desc']).draw();
        });

        // SweetAlert2 handler for category delete
        $(document).on('click', '.delete-category-btn', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4263eb',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + id).submit();
                }
            })
        });
    </script>
@endpush
