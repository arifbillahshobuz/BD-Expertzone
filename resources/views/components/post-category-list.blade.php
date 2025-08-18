<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('All Post Categories') }}</h3>
                    <div class="card-actions">
                        <!-- Button to trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createPostCategoryModal">
                            <i class="ti ti-plus"></i>
                            {{ __('Add new') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postCategories as $postCategory)
                                        <tr>
                                            <td>{{ $postCategory->title }}</td>
                                            <td>{{ $postCategory->created_at->format('d M Y') }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $postCategory->id }}">
                                                    <i class="ti ti-edit"></i> {{ __('Edit') }}
                                                </button>
                                                <form
                                                    action="{{ route('admin.post.category.destroy', $postCategory->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-category-btn">
                                                        <i class="ti ti-trash"></i>
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                                @include('components.post-category-edit-modal')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.dataTable').DataTable();
    });

    // SweetAlert2 handler for category delete
    $(document).on('click', '.delete-category-btn', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: 'Delete Category?',
            text: 'Are you sure you want to delete this post category?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Delete!',
            cancelButtonText: 'Cancel',
            customClass: {
                popup: 'swal2-horizontal-layout',
                actions: 'swal2-horizontal-actions'
            },
            buttonsStyling: true,
            allowOutsideClick: false,
            width: '450px',
            padding: '1.5rem'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>

<style>
    /* Custom horizontal layout for SweetAlert2 */
    .swal2-horizontal-layout {
        border-radius: 8px !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15) !important;
    }

    .swal2-horizontal-layout .swal2-content {
        display: flex !important;
        align-items: flex-start !important;
        gap: 1rem !important;
        text-align: left !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .swal2-horizontal-layout .swal2-icon {
        position: relative !important;
        margin: 0 !important;
        flex-shrink: 0 !important;
        width: 50px !important;
        height: 50px !important;
        border-width: 3px !important;
        margin-top: 0.2rem !important;
    }

    .swal2-horizontal-layout .swal2-icon.swal2-warning {
        border-color: #f39c12 !important;
        color: #f39c12 !important;
    }

    .swal2-horizontal-layout .swal2-icon.swal2-warning .swal2-icon-content {
        font-size: 2rem !important;
        font-weight: bold !important;
    }

    .swal2-horizontal-layout .swal2-html-container {
        flex: 1 !important;
        margin: 0 !important;
        padding: 0 !important;
        text-align: left !important;
    }

    .swal2-horizontal-layout .swal2-title {
        font-size: 1.2rem !important;
        font-weight: 600 !important;
        margin: 0 0 0.5rem 0 !important;
        text-align: left !important;
        color: #333 !important;
    }

    .swal2-horizontal-layout .swal2-html-container {
        font-size: 0.95rem !important;
        color: #666 !important;
        line-height: 1.4 !important;
    }

    .swal2-horizontal-actions {
        justify-content: flex-end !important;
        gap: 0.5rem !important;
        margin-top: 1.5rem !important;
    }

    .swal2-horizontal-actions .swal2-styled {
        padding: 0.5rem 1.2rem !important;
        font-size: 0.9rem !important;
        border-radius: 4px !important;
        font-weight: 500 !important;
        min-width: 80px !important;
    }

    .swal2-horizontal-actions .swal2-confirm {
        background-color: #dc3545 !important;
        border: none !important;
    }

    .swal2-horizontal-actions .swal2-confirm:hover {
        background-color: #c82333 !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3) !important;
    }

    .swal2-horizontal-actions .swal2-cancel {
        background-color: #6c757d !important;
        border: none !important;
    }

    .swal2-horizontal-actions .swal2-cancel:hover {
        background-color: #5a6268 !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 2px 8px rgba(108, 117, 125, 0.3) !important;
    }
</style>
