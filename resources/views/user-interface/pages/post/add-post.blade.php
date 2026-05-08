<style>
    #media-grid .preview-col {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }

    #media-grid .preview-col img,
    #media-grid .preview-col video {
        width: 100%;
        object-fit: cover;
        display: block;
        border-radius: 8px;
    }

    #media-grid .remove-btn {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        border: none;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-block card-stretch card-height create-post-modal">
            <div class="card-header d-flex justify-content-between border-bottom">
                <div class="header-title">
                    <h5 class="card-title">Add a Post</h5>
                </div>
                <div class="dropdown">
                    <div class="lh-1" data-bs-toggle="dropdown">
                        <span class="material-symbols-outlined">more_horiz</span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Check
                            in</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Live
                            Video</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">GIF</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Watch
                            Party</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Play with
                            Friend</a>
                    </div>
                </div>
            </div>

            <div class="card-body" data-bs-toggle="modal" data-bs-target="#post-modal" style="cursor:pointer;">
                <input type="text" class="form-control rounded px-0"
                    placeholder="Write And Share Your Post With Your Friends..." style="border:none;" readonly>
            </div>

            <div class="card-body bg-primary-subtle rounded-bottom-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-4">
                        <li>
                            <a href="javascript:void(0);" class="text-body" data-bs-toggle="modal"
                                data-bs-target="#post-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.5334 1.3761C12.3751 1.7111 12.6326 2.87776 12.9767 3.25276C13.3209 3.62776 13.8134 3.75526 14.0859 3.75526C15.5342 3.75526 16.7084 4.92943 16.7084 6.37693V11.2061C16.7084 13.1478 15.1334 14.7228 13.1917 14.7228H4.80841C2.86591 14.7228 1.29175 13.1478 1.29175 11.2061V6.37693C1.29175 4.92943 2.46591 3.75526 3.91425 3.75526C4.18591 3.75526 4.67841 3.62776 5.02341 3.25276C5.36758 2.87776 5.62425 1.7111 6.46591 1.3761C7.30841 1.0411 10.6917 1.0411 11.5334 1.3761Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M13.5794 5.91667H13.5869" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.6489 8.94C11.6489 7.47667 10.4631 6.29083 8.99975 6.29083C7.53642 6.29083 6.35059 7.47667 6.35059 8.94C6.35059 10.4033 7.53642 11.5892 8.99975 11.5892C10.4631 11.5892 11.6489 10.4033 11.6489 8.94Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-4">
                        <li><a href="javascript:void(0);" class="text-body fw-medium">Discard</a></li>
                        <li>
                            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                data-bs-target="#post-modal">Post</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="post-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Post</h5>
                <a href="javascript:void(0);" class="lh-1" data-bs-dismiss="modal">
                    <span class="material-symbols-outlined">close</span>
                </a>
            </div>
            <div class="modal-body">

                {{-- User + Textarea --}}
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ auth()->check() ? (auth()->user()->avatar ?? asset('frontend/assets/images/user/1.jpg')) : asset('frontend/assets/images/user/1.jpg') }}"
                        alt="userimg" class="avatar-60 rounded-circle img-fluid" loading="lazy">
                    <div class="ms-3 w-100">
                        <textarea id="post-content" class="form-control rounded" placeholder="Write something here..."
                            style="border:none; resize:none;" rows="3"></textarea>
                    </div>
                </div>

                {{-- Preview --}}
                <div id="media-preview" style="display:none;">
                    <div class="row g-2" id="media-grid"></div>
                </div>

                <hr>

                {{-- Upload Button --}}
                <div class="bg-primary-subtle rounded p-2 d-inline-block" id="media-upload-btn" style="cursor:pointer;">
                    <span class="material-symbols-outlined align-middle me-1" style="font-size:20px;">add_a_photo</span>
                    <span class="fw-medium">Photo/Video</span>
                </div>

                {{-- Hidden real file input --}}
                <input type="file" id="real-file-input" accept="image/*,video/*" multiple style="display:none;">

                <hr>

                <button type="button" id="post-submit-btn" class="btn btn-primary d-block w-100">
                    Post
                </button>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const uploadBtn = document.getElementById('media-upload-btn');
        const fileInput = document.getElementById('real-file-input');
        const preview = document.getElementById('media-preview');
        const grid = document.getElementById('media-grid');
        const submitBtn = document.getElementById('post-submit-btn');
        const contentEl = document.getElementById('post-content');

        let selectedFiles = [];

        // Click upload button → open file picker
        uploadBtn.addEventListener('click', function () {
            fileInput.click();
        });

        // File selected
        fileInput.addEventListener('change', function () {
            Array.from(this.files).forEach(function (file) {
                var duplicate = false;
                for (var i = 0; i < selectedFiles.length; i++) {
                    if (selectedFiles[i].name === file.name && selectedFiles[i].size === file.size) {
                        duplicate = true;
                        break;
                    }
                }
                if (!duplicate) {
                    selectedFiles.push(file);
                }
            });
            this.value = ''; // reset so same file can be picked again
            renderPreviews();
        });

        function renderPreviews() {
            grid.innerHTML = '';

            if (selectedFiles.length === 0) {
                preview.style.display = 'none';
                return;
            }

            preview.style.display = 'block';

            for (var i = 0; i < selectedFiles.length; i++) {
                (function (index) {
                    var file = selectedFiles[index];

                    var col = document.createElement('div');
                    if (selectedFiles.length === 1) {
                        col.className = 'col-12';
                    } else if (selectedFiles.length === 3 && index === 0) {
                        col.className = 'col-12';
                    } else {
                        col.className = 'col-6';
                    }

                    var wrap = document.createElement('div');
                    wrap.className = 'preview-col';

                    var isVideo = file.type.indexOf('video') === 0;
                    var mediaEl;

                    if (isVideo) {
                        mediaEl = document.createElement('video');
                        mediaEl.controls = true;
                    } else {
                        mediaEl = document.createElement('img');
                    }

                    mediaEl.src = URL.createObjectURL(file);
                    mediaEl.style.height = selectedFiles.length === 1 ? '300px' : '180px';
                    mediaEl.style.width = '100%';
                    mediaEl.style.objectFit = 'cover';

                    var removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'remove-btn';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.addEventListener('click', function () {
                        URL.revokeObjectURL(mediaEl.src);
                        selectedFiles.splice(index, 1);
                        renderPreviews();
                    });

                    wrap.appendChild(mediaEl);
                    wrap.appendChild(removeBtn);
                    col.appendChild(wrap);
                    grid.appendChild(col);

                })(i);
            }
        }

        // Submit
        // submitBtn.addEventListener('click', function() {
        //     var content = contentEl.value.trim();

        //     if (!content) {
        //         alert('Please write something before posting.');
        //         return;
        //     }

        //     submitBtn.disabled = true;
        //     submitBtn.textContent = 'Posting...';

        //     var formData = new FormData();
        //     formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        //     formData.append('content', content);

        //     for (var i = 0; i < selectedFiles.length; i++) {
        //         formData.append('media[]', selectedFiles[i]);
        //         console.log('Adding file:', selectedFiles[i].name);
        //     }

        //     console.log('Total files:', selectedFiles.length);

        //     fetch('{{ route('user.post.store') }}', {
        //         method: 'POST',
        //         body: formData,
        //     })
        //     .then(function(response) {
        //         return response.json();
        //     })
        //     .then(function(data) {
        //         console.log('Response:', data);
        //         if (data.success) {
        //             contentEl.value = '';
        //             selectedFiles = [];
        //             renderPreviews();
        //             var modal = bootstrap.Modal.getInstance(document.getElementById('post-modal'));
        //             if (modal) modal.hide();
        //             window.location.reload();
        //         } else {
        //             alert(data.message || 'Something went wrong.');
        //             submitBtn.disabled = false;
        //             submitBtn.textContent = 'Post';
        //         }
        //     })
        //     .catch(function(err) {
        //         console.error('Error:', err);
        //         alert('Failed to post. Please try again.');
        //         submitBtn.disabled = false;
        //         submitBtn.textContent = 'Post';
        //     });
        // });
        submitBtn.addEventListener('click', function () {
            var content = contentEl.value.trim();
            submitBtn.disabled = true;
            submitBtn.textContent = 'Posting...';

            var formData = new FormData();
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            formData.append('content', content);

            for (var i = 0; i < selectedFiles.length; i++) {
                formData.append('media[]', selectedFiles[i]);
                console.log('Adding file:', selectedFiles[i].name);
            }

            console.log('Total files:', selectedFiles.length);

            fetch('{{ route('user.post.store') }}', {
                method: 'POST',
                body: formData,
            })
                .then(function (response) {
                    // Check if response is a redirect (email verification middleware)
                    if (response.redirected) {
                        window.location.href = response.url;
                        return;
                    }
                    return response.json();
                })
                .then(function (data) {
                    // Handle the case where we got redirected
                    if (!data) return;

                    console.log('Response:', data);

                    if (data.success) {
                        contentEl.value = '';
                        selectedFiles = [];
                        renderPreviews();
                        var modal = bootstrap.Modal.getInstance(document.getElementById('post-modal'));
                        if (modal) modal.hide();
                        window.location.reload();
                    } else {
                        // Check if verification is required
                        if (data.require_verification) {
                            alert(data.message || 'Please verify your email address before posting.');
                            // Redirect to email verification notice page
                            window.location.href = '{{ route('verification.notice') }}';
                        } else {
                            alert(data.message || 'Something went wrong.');
                        }
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Post';
                    }
                })
                .catch(function (err) {
                    console.error('Error:', err);
                    alert('Failed to post. Please try again.');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Post';
                });
        });

    });
</script>