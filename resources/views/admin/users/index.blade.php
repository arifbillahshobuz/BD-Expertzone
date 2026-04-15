@extends('admin.layout.layout')

@section('title', 'Manage Users')

@section('content')
<div class="page-wrapper">

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_wrapper .dataTables_filter { margin-bottom: 1.5rem; }
        .dataTables_wrapper .dataTables_paginate { margin-top: 1.5rem; }
        #user-table_filter input { border-radius: 20px; padding: 5px 15px; border: 1px solid #e6e7e9; }
        #user-table thead th { border-bottom: 2px solid #e6e7e9; background: #f8fafc; }
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
        .dataTables_length select:hover, #user-sort-order:hover {
            border-color: #3b82f6;
            background-color: #f9fafb;
        }
    </style>
@endpush


<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Users Management
                </h2>
                <div class="text-muted mt-1">Manage and monitor all platform users</div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Advanced Filters & Quick Rankings -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="ti ti-filter me-2"></i>Smart Engagement Filter</h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-info quick-sort" data-column="4">Rank by Posts</button>
                    <button type="button" class="btn btn-sm btn-outline-info quick-sort" data-column="3">Rank by Followers</button>
                    <button type="button" class="btn btn-sm btn-outline-info quick-sort" data-column="2">Rank by Friends</button>
                    <button type="button" class="btn btn-sm btn-outline-info quick-sort" data-column="6">Rank by Likes</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label font-weight-bold">Min Posts</label>
                        <div class="input-group input-group-flat">
                            <input type="number" id="min-posts" class="form-control" placeholder="0">
                            <span class="input-group-text"><i class="ti ti-pencil"></i></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label font-weight-bold">Min Followers</label>
                        <div class="input-group input-group-flat">
                            <input type="number" id="min-followers" class="form-control" placeholder="0">
                            <span class="input-group-text"><i class="ti ti-users"></i></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label font-weight-bold">Min Friends</label>
                        <div class="input-group input-group-flat">
                            <input type="number" id="min-friends" class="form-control" placeholder="0">
                            <span class="input-group-text"><i class="ti ti-user-plus"></i></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label font-weight-bold">Min Comments</label>
                        <div class="input-group input-group-flat">
                            <input type="number" id="min-comments" class="form-control" placeholder="0">
                            <span class="input-group-text"><i class="ti ti-message-dots"></i></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label font-weight-bold">Min Likes</label>
                        <div class="input-group input-group-flat">
                            <input type="number" id="min-likes" class="form-control" placeholder="0">
                            <span class="input-group-text"><i class="ti ti-heart"></i></span>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button id="reset-filters" class="btn btn-danger w-100">
                            <i class="ti ti-refresh me-1"></i> Clear All
                        </button>
                    </div>
                </div>
                <div class="mt-2 small text-muted">
                    <i class="ti ti-info-circle me-1"></i> Tip: Use these filters separately or together to find your target users.
                </div>
            </div>
        </div>

        <div class="card p-4">
            <div class="table-responsive">
                <table id="user-table" class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User</th>
                            <th class="text-center">Reach & Stats</th>
                            <th>Status</th>
                            <th class="w-1 no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td data-label="User" data-order="{{ $user->name }}">
                                <div class="d-flex py-1 align-items-center">
                                    <span class="avatar me-2" style="background-image: url({{ asset($user->avatar ?? 'frontend/assets/images/user/1.jpg') }})"></span>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $user->name }}</div>
                                        <div class="text-secondary small">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                    <span class="badge bg-blue-lt" title="Friends" data-bs-toggle="tooltip">
                                        <i class="ti ti-users me-1"></i>{{ $user->friends_count }}
                                    </span>
                                    <span class="badge bg-purple-lt" title="Followers" data-bs-toggle="tooltip">
                                        <i class="ti ti-rss me-1"></i>{{ $user->followers_count }}
                                    </span>
                                    <span class="badge bg-green-lt" title="Posts" data-bs-toggle="tooltip">
                                        <i class="ti ti-notes me-1"></i>{{ $user->posts_count }}
                                    </span>
                                    <span class="badge bg-yellow-lt" title="Comments" data-bs-toggle="tooltip">
                                        <i class="ti ti-message-dots me-1"></i>{{ $user->comments_count }}
                                    </span>
                                    <span class="badge bg-red-lt" title="Likes" data-bs-toggle="tooltip">
                                        <i class="ti ti-heart me-1"></i>{{ $user->reactions_count }}
                                    </span>
                                </div>
                            </td>
                            <td data-label="Status">
                                @php
                                    $statusClass = [
                                        'active' => 'bg-success',
                                        'inactive' => 'bg-warning',
                                        'banned' => 'bg-danger'
                                    ][$user->status ?? 'active'] ?? 'bg-secondary';
                                @endphp
                                <span class="badge {{ $statusClass }} text-white text-capitalize">{{ $user->status ?? 'Active' }}</span>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('admin.users.show', $user->username) }}" class="btn btn-white btn-icon" title="View History">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    @can('user-edit')
                                    <a href="{{ route('admin.users.edit', $user->username) }}" class="btn btn-primary btn-icon" title="Edit User">
                                        <i class="ti ti-edit"></i>
                                    </a>
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
</div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            const table = $('#user-table').DataTable({
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [[0, "asc"]],
                "columnDefs": [
                    { "orderable": false, "targets": 4 } 
                ],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search Users...",
                    "paginate": { "previous": "<i class='ti ti-chevron-left'></i>", "next": "<i class='ti ti-chevron-right'></i>" }
                },
                "dom": '<"d-flex justify-content-between align-items-center mb-3" <"d-flex align-items-center" l <"#user-sort-wrapper" >> f>t<"d-flex justify-content-between align-items-center mt-3"ip>',
                "initComplete": function() {
                    $('#user-sort-wrapper').html(`
                        <div class="ms-3 d-flex align-items-center">
                            <span class="fw-bold text-dark small me-2 d-none d-md-inline">Sort:</span>
                            <select id="user-sort-order" class="form-select form-select-sm shadow-sm" style="width: 140px;">
                                <option value="asc">Oldest First</option>
                                <option value="desc" selected>Newest First</option>
                            </select>
                        </div>
                    `);
                    
                    $('#user-sort-order').on('change', function() {
                        const order = $(this).val();
                        table.order([0, order]).draw();
                    });
                }
            });
            table.order([0, 'desc']).draw();

            // Custom Range Filtering Logic
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                const minFriends = parseInt($('#min-friends').val(), 10) || 0;
                const minFollowers = parseInt($('#min-followers').val(), 10) || 0;
                const minPosts = parseInt($('#min-posts').val(), 10) || 0;
                const minComments = parseInt($('#min-comments').val(), 10) || 0;
                const minLikes = parseInt($('#min-likes').val(), 10) || 0;

                // Extract values from the Stats cell (index 2) using regex or simple parsing
                // The cell text looks like: "Friends 12 Followers 24..."
                const statsText = data[2] || "";
                
                const valFriends = parseInt(statsText.match(/Friends\s+(\d+)/)?.[1]) || 0;
                const valFollowers = parseInt(statsText.match(/Followers\s+(\d+)/)?.[1]) || 0;
                const valPosts = parseInt(statsText.match(/Posts\s+(\d+)/)?.[1]) || 0;
                const valComments = parseInt(statsText.match(/Comments\s+(\d+)/)?.[1]) || 0;
                const valLikes = parseInt(statsText.match(/Likes\s+(\d+)/)?.[1]) || 0;

                if (valFriends >= minFriends && 
                    valFollowers >= minFollowers && 
                    valPosts >= minPosts && 
                    valComments >= minComments && 
                    valLikes >= minLikes) {
                    return true;
                }
                return false;
            });

            // Trigger redraw on input change
            $('#min-friends, #min-followers, #min-posts, #min-comments, #min-likes').on('keyup change', function() {
                table.draw();
            });

            // Reset filters
            $('#reset-filters').on('click', function() {
                $('#min-friends, #min-followers, #min-posts, #min-comments, #min-likes').val('');
                table.draw();
            });

            // Quick Ranking Buttons
            $('.quick-sort').on('click', function() {
                const columnIdx = $(this).data('column');
                // Toggle sorting or just sort descending (usually what admin wants for "Rank")
                table.order([columnIdx, 'desc']).draw();
                
                // Active state for button
                $('.quick-sort').removeClass('btn-info').addClass('btn-outline-info');
                $(this).removeClass('btn-outline-info').addClass('btn-info');
            });
        });
    </script>
@endpush
