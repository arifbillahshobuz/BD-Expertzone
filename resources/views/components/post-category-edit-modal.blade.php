<!-- Modal for Editing -->
<div class="modal fade" id="editModal{{ $postCategory->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $postCategory->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $postCategory->id }}">{{ __('Update Post Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.post.category.update', $postCategory->id) }}" method="POST" class="x-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Post Category Name') }}</label>
                        <input name="title" class="form-control" value="{{ $postCategory->title }}" required />
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

