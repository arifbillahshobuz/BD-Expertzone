@extends('admin.layout.layout')

@section('title', 'Edit Post')

@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
@endpush

@section('content')
<div class="page-wrapper">
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Moderate Post</h2>
                <div class="text-muted mt-1">Editing content ID #{{ $post->id }}</div>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"><i class="ti ti-arrow-left me-1"></i> Back to List</a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row row-cards">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Post Content</label>
                                <textarea name="content" id="editor" class="form-control" rows="10">{{ old('content', $post->content) }}</textarea>
                                <small class="text-muted">You can edit the text directly as an admin.</small>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Add Media Attachments</label>
                                <input type="file" name="media[]" class="form-control" multiple>
                                <small class="text-muted">Upload new files to add to the existing gallery.</small>
                            </div>
                            
                            @if($post->media)
                                <div class="row g-2 mt-2">
                                    <label class="form-label">Current Media:</label>
                                    @foreach($post->media as $file)
                                        <div class="col-4">
                                            <div class="img-responsive img-responsive-21x9 rounded border" style="background-image: url({{ asset($file) }})"></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header"><h3 class="card-title">Categorization & Visibility</h3></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="post_category_id" class="form-select">
                                    <option value="">Uncategorized</option>
                                    @foreach($postCategories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('post_category_id', $post->post_category_id) == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Publishing Status</label>
                                <select name="is_published" class="form-select">
                                    <option value="1" {{ old('is_published', $post->is_published) ? 'selected' : '' }}>Published (Visible)</option>
                                    <option value="0" {{ old('is_published', $post->is_published) ? '' : 'selected' }}>Hidden (Draft/Moderated)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Featured Status</label>
                                <select name="is_featured" class="form-select">
                                    <option value="0" {{ old('is_featured', $post->is_featured) ? '' : 'selected' }}>Standard</option>
                                    <option value="1" {{ old('is_featured', $post->is_featured) ? 'selected' : '' }}>Featured</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="ti ti-check me-1"></i> Update Post Content
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
