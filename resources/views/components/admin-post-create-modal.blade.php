<div class="modal fade" id="createPostCategoryModal" tabindex="-1" aria-labelledby="createPostCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createPostCategoryModal">{{ __('Create Post Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.post.category.store') }}" method="POST" class="x-form">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Post Category Name') }}</label>
                        <input name="title" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your Post Category Name" />
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
