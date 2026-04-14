<div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $post->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $post->id }}">{{ __('Edit Admin Post') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="post-category-{{ $post->id }}" class="form-label">{{ __('Post Category') }}</label>
                        <select name="post_category_id" id="post-category-{{ $post->id }}" class="form-select">
                            <option value="">Select Post Category</option>
                            @foreach ($postCategories as $postCategory)
                                <option value="{{ $postCategory->id }}" {{ $post->post_category_id == $postCategory->id ? 'selected' : '' }}>
                                    {{ $postCategory->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="editor-edit-{{ $post->id }}" cols="10" rows="10">{!! $post->content !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        @if($post->media && is_array($post->media) && isset($post->media[0]))
                            <div class="mb-2">
                                <img src="{{ asset($post->media[0]) }}" alt="Current Image" width="100">
                            </div>
                        @elseif($post->media && !is_array($post->media))
                            <div class="mb-2">
                                <img src="{{ asset('uploads/post/' . $post->media) }}" alt="Current Image" width="100">
                            </div>
                        @else
                            <p>No image uploaded</p>
                        @endif
                        <input type="file" class="form-control" name="media">
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    if (typeof ClassicEditor !== 'undefined') {
        ClassicEditor
            .create(document.querySelector('#editor-edit-{{ $post->id }}'))
            .catch(error => {
                console.error(error);
            });
    }
</script>