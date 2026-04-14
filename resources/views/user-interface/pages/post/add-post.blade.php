{{-- Custom css --}}
<style>
    #media-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    #media-preview img,
    #media-preview video {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 4px;
        margin: 0;
    }

    #media-grid .col-md-6 {
        aspect-ratio: 1/1;
    }

    #media-grid .col-12 {
        aspect-ratio: 16/9;
    }

    #media-grid .col-md-12 {
        grid-column: span 2;
    }

    .video-duration {
        position: absolute;
        bottom: 4px;
        right: 4px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 1px 4px;
        border-radius: 3px;
        font-size: 10px;
    }
</style>


<div class="row">
    <div class="col-sm-12">
        <div id="post-modal-data" class="card card-block card-stretch card-height create-post-modal">
            <div class="card-header d-flex justify-content-between border-bottom">
                <div class="header-title">
                    <h5 class="card-title">Add a Post</h5>
                </div>
                <div class="dropdown">
                    <div class="lh-1" id="post-option" data-bs-toggle="dropdown">
                        <span class="material-symbols-outlined">
                            more_horiz
                        </span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option" style="">
                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#post-modal">Check in</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Live
                            Video</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#post-modal">GIF</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#post-modal">Watch Party</a>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Play
                            with Friend</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-5" data-bs-toggle="modal" data-bs-target="#post-modal">
                    <form class="post-text w-100" action="javascript:void();">
                        <input type="text" class="form-control rounded px-0"
                            placeholder="Write And Share Your Post With Your Friends..." style="border:none;">
                    </form>
                </div>
            </div>
            <div class="card-body bg-primary-subtle rounded-bottom-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="create-post-data">
                        <ul class="list-inline m-0 p-0 d-flex align-items-center gap-4">
                            <li>
                                <a href="javascript:void(0);" class="text-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16"
                                        viewBox="0 0 18 16" fill="none">
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
                            <li>
                                <a href="javascript:void(0);" class="text-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.23043 11.6718C4.02709 11.6718 1.29126 12.156 1.29126 14.096C1.29126 16.036 4.01043 16.5377 7.23043 16.5377C10.4346 16.5377 13.1696 16.0527 13.1696 14.1135C13.1696 12.1743 10.4513 11.6718 7.23043 11.6718Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.23042 8.90493C9.33292 8.90493 11.0371 7.20076 11.0371 5.09826C11.0371 2.99576 9.33292 1.2916 7.23042 1.2916C5.12875 1.2916 3.42459 2.99576 3.42459 5.09826C3.41709 7.19326 5.10875 8.89743 7.20459 8.90493H7.23042Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15.0031 6.22427V9.56594" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.7079 7.895H13.2996" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="text-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18"
                                        viewBox="0 0 14 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.08341 7.75041C9.08341 6.59935 8.15072 5.66666 7.0005 5.66666C5.84944 5.66666 4.91675 6.59935 4.91675 7.75041C4.91675 8.90063 5.84944 9.83332 7.0005 9.83332C8.15072 9.83332 9.08341 8.90063 9.08341 7.75041Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="list-inline m-0 p-0 d-flex align-items-center gap-4">
                            <li>
                                <a href="javascript:void(0);" class="text-body fw-medium">
                                    Discard
                                </a>
                            </li>
                            <li>
                                <button type="button" class="btn btn-primary px-4">
                                    Post
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="post-modal" tabindex="-1" aria-labelledby="post-modalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="post-modalLabel">Create Post</h5>
                            <a href="javascript:void(0);" class="lh-1" data-bs-dismiss="modal">
                                <span class="material-symbols-outlined">close</span>
                            </a>
                        </div>
                        <form action="{{ route('user.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <div class="user-img">
                                        <img src="{{ auth()->check() ? (auth()->user()->avatar ?? asset('frontend/assets/images/user/1.jpg')) : asset('frontend/assets/images/user/1.jpg') }}" alt="userimg"
                                            class="avatar-60 rounded-circle img-fluid" loading="lazy">
                                    </div>
                                    <div class="post-text ms-3 w-100">
                                        <textarea name="content" class="form-control rounded" placeholder="Write something here..."
                                            style="border:none; resize: none;" rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- File input (hidden) -->
                                <input type="file" id="file-input" name="media[]" accept="image/*,video/*"
                                    style="display: none;" multiple>

                                <!-- Preview container -->
                                <div id="media-preview" class="mt-3" style="display: none;">
                                    <div class="row g-2" id="media-grid"></div>
                                </div>

                                <hr>
                                <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                    <li class="col-md-6 mb-3">
                                        <div class="bg-primary-subtle rounded p-2 pointer me-3" id="media-upload-btn">
                                            <a href="javascript:void(0);" class="d-inline-block fw-medium text-body">
                                                <span class="material-symbols-outlined align-middle font-size-20 me-1">
                                                    add_a_photo
                                                </span>
                                                Photo/Video
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                                <button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mediaUploadBtn = document.getElementById('media-upload-btn');
        const fileInput = document.getElementById('file-input');
        const mediaPreview = document.getElementById('media-preview');
        const mediaGrid = document.getElementById('media-grid');
        const postForm = document.getElementById('post-form');

        // Trigger file input when Photo/Video is clicked
        mediaUploadBtn.addEventListener('click', function() {
            fileInput.click();
        });

        // Handle file selection
        fileInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                mediaPreview.style.display = 'block';
                mediaGrid.innerHTML = ''; // Clear previous previews

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const fileType = file.type.split('/')[0];
                    const colDiv = document.createElement('div');

                    // Different column sizes based on number of items
                    if (files.length === 1) {
                        colDiv.className = 'col-12';
                    } else if (files.length === 2) {
                        colDiv.className = 'col-md-6';
                    } else if (files.length === 3) {
                        colDiv.className = i === 0 ? 'col-md-12' : 'col-md-6';
                    } else {
                        colDiv.className = 'col-md-6';
                    }

                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'position-relative h-100';

                    if (fileType === 'image') {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.className = 'img-fluid rounded w-100 h-100';
                        img.style.objectFit = 'cover';
                        img.style.minHeight = files.length === 1 ? '300px' : '200px';
                        previewDiv.appendChild(img);
                    } else if (fileType === 'video') {
                        const videoContainer = document.createElement('div');
                        videoContainer.className = 'position-relative';

                        const video = document.createElement('video');
                        video.src = URL.createObjectURL(file);
                        video.controls = true;
                        video.className = 'img-fluid rounded w-100';
                        video.style.minHeight = files.length === 1 ? '300px' : '200px';
                        video.style.objectFit = 'cover';

                        const durationBadge = document.createElement('div');
                        durationBadge.className =
                            'position-absolute bottom-0 end-0 bg-dark text-white p-1 m-2 rounded';
                        durationBadge.style.fontSize = '12px';
                        durationBadge.textContent = '0:45';

                        videoContainer.appendChild(video);
                        videoContainer.appendChild(durationBadge);
                        previewDiv.appendChild(videoContainer);
                    }

                    // Add remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.innerHTML = '&times;';
                    removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0 m-1';
                    removeBtn.style.width = '25px';
                    removeBtn.style.height = '25px';
                    removeBtn.style.padding = '0';
                    removeBtn.style.borderRadius = '50%';
                    removeBtn.onclick = function() {
                        // Remove the file from the input
                        const dt = new DataTransfer();
                        const input = fileInput;

                        for (let j = 0; j < input.files.length; j++) {
                            if (j !== i) {
                                dt.items.add(input.files[j]);
                            }
                        }

                        input.files = dt.files;

                        // Update the preview
                        colDiv.remove();
                        if (mediaGrid.children.length === 0) {
                            mediaPreview.style.display = 'none';
                        }
                    };

                    previewDiv.appendChild(removeBtn);
                    colDiv.appendChild(previewDiv);
                    mediaGrid.appendChild(colDiv);
                }
            }
        });

    });
</script>
