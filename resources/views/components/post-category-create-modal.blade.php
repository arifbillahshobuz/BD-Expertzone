<div class="modal fade" id="createPostCategoryModal" tabindex="-1" aria-labelledby="createPostCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createPostCategoryModal">{{ __('Create Post Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <form action="{{ route('admin.post.category.store') }}" method="POST" class="ajax-form">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold">{{ __('Category Name') }}</label>
                        <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                            <span class="input-group-text bg-white border-0">
                                <i class="ti ti-category text-primary"></i>
                            </span>
                            <input name="title" value="{{ old('title') }}" class="form-control border-0 px-2 py-2 @error('title') is-invalid @enderror" placeholder="Technology" />
                        </div>
                        @error('title')
                        <div class="small text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="modal-footer border-0 px-0 pb-0 mt-3">
                        <button type="button" class="btn btn-link text-muted" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill shadow">
                            <i class="ti ti-plus me-1"></i> Create Category
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
