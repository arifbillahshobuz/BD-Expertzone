@extends('admin.layout.layout')

@section('title', 'Create Admin Post')

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
                <h2 class="page-title">Create Official Post</h2>
                <div class="text-muted mt-1">Publish news or updates as an administrator</div>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"><i class="ti ti-arrow-left me-1"></i> Back to List</a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row row-cards">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Post Content</label>
                                <textarea name="content" id="editor" class="form-control" rows="10" placeholder="What's on your mind, admin?">{{ old('content') }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Media Attachments</label>
                                <input type="file" name="media[]" class="form-control" multiple>
                                <small class="text-muted">You can upload multiple photos or videos.</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header"><h3 class="card-title">Publishing Settings</h3></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Category</label>
                                <select name="post_category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach($postCategories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('post_category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="row">
                                    <span class="col">Mark as Featured</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                        </label>
                                    </span>
                                </label>
                                <small class="text-muted">Featured posts appear at the top of the feed.</small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="ti ti-send me-1"></i> Publish Now
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
