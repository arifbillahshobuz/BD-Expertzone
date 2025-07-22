{{-- Edit Post Modal --}}
<div class="modal fade" id="edit-post-modal" tabindex="-1" aria-labelledby="edit-post-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-post-modalLabel">Edit Post</h5>
                <a href="javascript:void(0);" class="lh-1" data-bs-dismiss="modal">
                    <span class="material-symbols-outlined">close</span>
                </a>
            </div>
            <form id="edit-post-form" action="{{ route('user.post.update', ['post' => '__POST_ID__']) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <div class="user-img">
                            <img src="{{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                alt="userimg" class="avatar-60 rounded-circle img-fluid" loading="lazy">
                        </div>
                        <div class="post-text ms-3 w-100">
                            <textarea name="content" class="form-control rounded" placeholder="Edit your post..." style="border:none; resize: none;"
                                rows="3">{{ old('content', $post->content ?? '') }}</textarea>
                        </div>
                    </div>
                    <!-- File input (hidden) -->
                    <input type="file" id="edit-file-input" name="media[]" accept="image/*,video/*"
                        style="display: none;" multiple>
                    <!-- Preview container -->
                    <div id="edit-media-preview" class="mt-3"
                        style="display: {{ !empty($post->media) ? 'block' : 'none' }};">
                        <div class="row g-2" id="edit-media-grid">
                            @if (!empty($post->media))
                                @foreach ((array) $post->media as $media)
                                    @php $fileType = pathinfo($media, PATHINFO_EXTENSION); @endphp
                                    <div class="col-md-6">
                                        <div class="position-relative h-100">
                                            @if (in_array($fileType, ['mp4', 'mov', 'ogg', 'webm', 'qt']))
                                                <video src="{{ asset($media) }}" controls
                                                    class="img-fluid rounded w-100"
                                                    style="object-fit:cover;min-height:200px;"></video>
                                            @else
                                                <img src="{{ asset($media) }}" class="img-fluid rounded w-100 h-100"
                                                    style="object-fit:cover;min-height:200px;" />
                                            @endif
                                            <button type="button"
                                                class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-media-btn"
                                                data-media="{{ $media }}"
                                                style="width:25px;height:25px;padding:0;border-radius:50%;">&times;</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <hr>
                    <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                        <li class="col-md-6 mb-3">
                            <div class="bg-primary-subtle rounded p-2 pointer me-3" id="edit-media-upload-btn">
                                <a href="javascript:void(0);" class="d-inline-block fw-medium text-body">
                                    <span
                                        class="material-symbols-outlined align-middle font-size-20 me-1">add_a_photo</span>
                                    Photo/Video
                                </a>
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <button type="submit" class="btn btn-primary d-block w-100 mt-3">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editMediaUploadBtn = document.getElementById('edit-media-upload-btn');
        const editFileInput = document.getElementById('edit-file-input');
        const editMediaPreview = document.getElementById('edit-media-preview');
        const editMediaGrid = document.getElementById('edit-media-grid');
        if (editMediaUploadBtn && editFileInput) {
            editMediaUploadBtn.addEventListener('click', function() {
                editFileInput.click();
            });
            editFileInput.addEventListener('change', function(e) {
                const files = e.target.files;
                if (files.length > 0) {
                    editMediaPreview.style.display = 'block';
                    editMediaGrid.innerHTML = '';
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const fileType = file.type.split('/')[0];
                        const colDiv = document.createElement('div');
                        colDiv.className = 'col-md-6';
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'position-relative h-100';
                        if (fileType === 'image') {
                            const img = document.createElement('img');
                            img.src = URL.createObjectURL(file);
                            img.className = 'img-fluid rounded w-100 h-100';
                            img.style.objectFit = 'cover';
                            img.style.minHeight = '200px';
                            previewDiv.appendChild(img);
                        } else if (fileType === 'video') {
                            const video = document.createElement('video');
                            video.src = URL.createObjectURL(file);
                            video.controls = true;
                            video.className = 'img-fluid rounded w-100';
                            video.style.minHeight = '200px';
                            video.style.objectFit = 'cover';
                            previewDiv.appendChild(video);
                        }
                        // Remove button
                        const removeBtn = document.createElement('button');
                        removeBtn.innerHTML = '&times;';
                        removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0 m-1';
                        removeBtn.style.width = '25px';
                        removeBtn.style.height = '25px';
                        removeBtn.style.padding = '0';
                        removeBtn.style.borderRadius = '50%';
                        removeBtn.onclick = function() {
                            const dt = new DataTransfer();
                            for (let j = 0; j < editFileInput.files.length; j++) {
                                if (j !== i) {
                                    dt.items.add(editFileInput.files[j]);
                                }
                            }
                            editFileInput.files = dt.files;
                            colDiv.remove();
                            if (editMediaGrid.children.length === 0) {
                                editMediaPreview.style.display = 'none';
                            }
                        };
                        previewDiv.appendChild(removeBtn);
                        colDiv.appendChild(previewDiv);
                        editMediaGrid.appendChild(colDiv);
                    }
                }
            });
        }
        // Remove existing media (AJAX or mark for removal)
        document.querySelectorAll('.remove-media-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                // You can implement AJAX removal or mark for removal on submit
                this.closest('.col-md-6').remove();
            });
        });
    });
</script>
