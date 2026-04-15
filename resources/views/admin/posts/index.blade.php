@extends('admin.layout.layout')

@section('title', 'Manage Posts')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_wrapper .dataTables_filter { margin-bottom: 1.5rem; }
        .dataTables_wrapper .dataTables_paginate { margin-top: 1.5rem; }
        #post-table_filter input { border-radius: 20px; padding: 5px 15px; border: 1px solid #e6e7e9; }
        #post-table thead th { border-bottom: 2px solid #e6e7e9; background: #f8fafc; }
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
    </style>
@endpush

@section('content')
<div class="page-wrapper">
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Posts Management</h2>
                <div class="text-muted mt-1">Audit and moderate all community content</div>
            </div>
            <div class="col-auto ms-auto">
                @can('post-create')
                <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
                    <i class="ti ti-plus me-1"></i> Create Official Post
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Advanced Filters -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="ti ti-filter me-2"></i>Post Engagement Filters</h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-primary quick-sort" data-column="2">By Reactions</button>
                    <button type="button" class="btn btn-sm btn-outline-primary quick-sort" data-column="3">By Comments</button>
                    <button type="button" class="btn btn-sm btn-outline-info filter-type" data-type="Admin">Admin Posts Only</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label font-weight-bold">Min Reactions</label>
                        <input type="number" id="min-reactions" class="form-control" placeholder="0">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label font-weight-bold">Min Comments</label>
                        <input type="number" id="min-comments" class="form-control" placeholder="0">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label font-weight-bold">Filter by Author</label>
                        <input type="text" id="search-author" class="form-control" placeholder="Username...">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button id="reset-filters" class="btn btn-danger w-100">
                            <i class="ti ti-refresh me-1"></i> Clear All
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-4">
            <div class="table-responsive">
                <table id="post-table" class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Post Content / Title</th>
                            <th>Reactions</th>
                            <th>Comments</th>
                            <th>Status</th>
                            <th class="d-none">Type</th>
                            <th class="w-1 no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-sm me-2" style="background-image: url({{ asset($post->user->avatar ?? 'frontend/assets/images/user/1.jpg') }})"></span>
                                    <div>
                                        <div class="font-weight-medium">{{ $post->user->name ?? 'Deleted User' }}</div>
                                        @if($post->type == 1)
                                            <span class="badge bg-purple-lt text-uppercase" style="font-size: 8px;">Official</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-secondary" title="{{ strip_tags($post->content) }}">
                                    @php
                                        $content = strip_tags($post->content);
                                        $words = explode(' ', $content);
                                        $truncated = implode(' ', array_slice($words, 0, 4));
                                        if (count($words) > 4) $truncated .= '...';
                                    @endphp
                                    {{ $truncated }}
                                </div>
                                <div class="small text-muted">{{ $post->created_at->format('M d, Y') }}</div>
                            </td>
                            <td data-order="{{ $post->reactions_count }}">
                                <span class="badge bg-red-lt"><i class="ti ti-heart me-1"></i> {{ $post->reactions_count }}</span>
                            </td>
                            <td data-order="{{ $post->comments_count }}">
                                <span class="badge bg-blue-lt"><i class="ti ti-message me-1"></i> {{ $post->comments_count }}</span>
                            </td>
                            <td>
                                <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-warning' }} text-white">
                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="d-none">{{ $post->type == 1 ? 'Admin' : 'User' }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-white btn-icon" title="View Post Details">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    @can('post-edit')
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-icon" title="Edit Post">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    @endcan
                                    @can('post-delete')
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon" title="Delete Post">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
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
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            let activeTypeFilter = null;
            const table = $('#post-table').DataTable({
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [[1, "desc"]],
                "columnDefs": [ { "orderable": false, "targets": 6 } ],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search posts...",
                    "paginate": { "previous": "<i class='ti ti-chevron-left'></i>", "next": "<i class='ti ti-chevron-right'></i>" }
                },
                "dom": '<"d-flex justify-content-between align-items-center mb-3" <"d-flex align-items-center" l <"#post-sort-wrapper" >> f>t<"d-flex justify-content-between align-items-center mt-3"ip>',
                "initComplete": function() {
                    $('#post-sort-wrapper').html(`
                        <div class="ms-3 d-flex align-items-center">
                            <span class="fw-bold text-dark small me-2 d-none d-md-inline">Sort:</span>
                            <select id="post-sort-order" class="form-select form-select-sm shadow-sm" style="width: 140px;">
                                <option value="asc">Oldest First</option>
                                <option value="desc" selected>Newest First</option>
                            </select>
                        </div>
                    `);
                    
                    $('#post-sort-order').on('change', function() {
                        const order = $(this).val();
                        table.order([1, order]).draw(); // Sort by Date column (index 1)
                    });
                }
            });

            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                const minReact = parseInt($('#min-reactions').val(), 10) || 0;
                const minComm = parseInt($('#min-comments').val(), 10) || 0;
                const authorSearch = $('#search-author').val().toLowerCase();
                const valReact = parseInt(data[2]) || 0;
                const valComm = parseInt(data[3]) || 0;
                const valAuthor = data[0].toLowerCase();
                const valType = data[5];

                if (valReact >= minReact && valComm >= minComm && 
                    (authorSearch === "" || valAuthor.includes(authorSearch)) &&
                    (activeTypeFilter === null || valType === activeTypeFilter)) {
                    return true;
                }
                return false;
            });

            $('#min-reactions, #min-comments, #search-author').on('keyup change', function() { table.draw(); });
            $('#reset-filters').on('click', function() {
                $('#min-reactions, #min-comments, #search-author').val('');
                activeTypeFilter = null;
                $('.filter-type').removeClass('btn-info').addClass('btn-outline-info');
                table.draw();
            });

            $('.quick-sort').on('click', function() {
                const colIdx = $(this).data('column');
                table.order([colIdx, 'desc']).draw();
                $('.quick-sort').removeClass('btn-primary').addClass('btn-outline-primary');
                $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            });

            $('.filter-type').on('click', function() {
                const type = $(this).data('type');
                if (activeTypeFilter === type) {
                    activeTypeFilter = null;
                    $(this).removeClass('btn-info').addClass('btn-outline-info');
                } else {
                    activeTypeFilter = type;
                    $('.filter-type').removeClass('btn-info').addClass('btn-outline-info');
                    $(this).removeClass('btn-outline-info').addClass('btn-info');
                }
                table.draw();
            });
        });
    </script>
@endpush