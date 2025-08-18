<div class="modal fade" id="createPostrModal" tabindex="-1" aria-labelledby="createPostCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostCategoryModal">{{ __('Create Post Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.post.store') }}" method="POST" class="x-form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Post Category Name') }}</label>
                        <select name="post_category_id" id="post-category" class="form-select {{ $errors->has('post_category_id') ? 'is-invalid' : '' }}">
                            <option value="">Select Post Category</option>
                            @foreach ($postCategories as $postCategory)
                                <option value="{{ $postCategory->id }}" {{ old('post_category_id') == $postCategory->id ? 'selected' : '' }}>
                                    {{ $postCategory->title }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('post_category_id'))
                            <span class="text-danger">{{ $errors->first('post_category_id') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label>Enter Your Content</label>
                            <textarea name="content" class="form-control" id="editor" cols="10" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>image</label>
                        <input type="file" title="Insert Your Image" name="media">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            editor_config: {
                height: '500px' // Set the height as needed
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
