@extends('admin.layout.layout')

@section('title', 'Post Details')

@section('content')
<div class="page-wrapper">
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Post Inspection</h2>
                <div class="text-muted mt-1">Reviewing content by {{ $post->user->name ?? 'Unknown' }}</div>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"><i class="ti ti-arrow-left me-1"></i> Back</a>
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary"><i class="ti ti-edit me-1"></i> Edit Post</a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <span class="avatar avatar-md me-3" style="background-image: url({{ asset($post->user->avatar ?? 'frontend/assets/images/user/1.jpg') }})"></span>
                            <div>
                                <h3 class="mb-0">{{ $post->user->name ?? 'Unknown' }}</h3>
                                <div class="text-muted">Posted on {{ $post->created_at->format('F d, Y at H:i A') }}</div>
                            </div>
                        </div>
                        <div class="post-content bg-light p-4 rounded mb-4" style="font-size: 1.1rem; line-height: 1.6;">
                            {!! $post->content !!}
                        </div>
                        
                        @if($post->media)
                            <div class="row g-2">
                                @foreach($post->media as $file)
                                    <div class="col-6">
                                        <a href="{{ asset($file) }}" target="_blank">
                                            @php $ext = pathinfo($file, PATHINFO_EXTENSION); @endphp
                                            @if(in_array($ext, ['mp4', 'webm', 'mov']))
                                                <video src="{{ asset($file) }}" class="img-fluid rounded border" style="max-height: 300px; width: 100%; object-fit: cover;"></video>
                                            @else
                                                <img src="{{ asset($file) }}" class="img-fluid rounded border" style="max-height: 300px; width: 100%; object-fit: cover;">
                                            @endif
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h3 class="card-title">Recent Comments ({{ $post->comments_count }})</h3></div>
                    <div class="list-group list-group-flush">
                        @forelse($post->comments as $comment)
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar avatar-sm" style="background-image: url({{ asset($comment->user->avatar ?? 'frontend/assets/images/user/1.jpg') }})"></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $comment->user->name }}</div>
                                        <div class="text-secondary">{{ $comment->content }}</div>
                                        <div class="small text-muted">{{ $comment->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center text-muted">No comments on this post yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header"><h3 class="card-title">Engagement Stats</h3></div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6 border-end">
                                <div class="h2 mb-0">{{ $post->reactions_count }}</div>
                                <div class="text-muted small">Total Reactions</div>
                            </div>
                            <div class="col-6">
                                <div class="h2 mb-0">{{ $post->comments_count }}</div>
                                <div class="text-muted small">Total Comments</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header"><h3 class="card-title">System Info</h3></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label text-muted small uppercase">Category</label>
                            <div class="font-weight-bold">{{ $post->category->title ?? 'Uncategorized' }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small uppercase">Visibility</label>
                            <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-warning' }} text-white">
                                {{ $post->is_published ? 'Publicly Visible' : 'Draft / Hidden' }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small uppercase">Post Type</label>
                            <div class="text-capitalize">{{ $post->post_type ?? 'User Post' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
