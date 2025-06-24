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
                                                <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this post Category?');"
                                                        class="btn btn-danger">
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

<script >
    $(document).ready( function () {
        $('.dataTable').DataTable();
    } );

</script>
