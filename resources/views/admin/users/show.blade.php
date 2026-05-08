@extends('admin.layout.layout')

@section('title', 'User History - ' . $user->name)

@section('content')
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            User History & Details
                        </h2>
                        <div class="text-muted mt-1">Snapshot of {{ $user->name }}'s activity</div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                                <i class="ti ti-arrow-left me-1"></i> Back to List
                            </a>
                            <a href="{{ route('admin.users.edit', $user->username) }}"
                                class="btn btn-primary d-none d-sm-inline-block">
                                <i class="ti ti-edit me-1"></i> Edit User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <!-- User Info Card -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <span class="avatar avatar-xl rounded-circle"
                                        style="background-image: url({{ asset($user->avatar ?? 'frontend/assets/images/user/1.jpg') }})"></span>
                                </div>
                                <h3 class="card-title mb-1">{{ $user->name }}</h3>
                                <div class="text-secondary">@ {{ $user->username }}</div>
                                <div class="text-secondary small mb-3">{{ $user->email }}</div>

                                <div class="d-flex justify-content-center gap-2">
                                    <span class="badge bg-green-lt">Joined:
                                        {{ $user->created_at ? $user->created_at->format('M Y') : 'N/A' }}</span>
                                    <span
                                        class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }} text-white">{{ ucfirst($user->status ?? 'Active') }}</span>
                                </div>
                            </div>
                            <div class="card-footer p-0">
                                <div class="d-flex text-center divide-x">
                                    <div class="flex-grow-1 p-3">
                                        <div class="font-weight-bold">{{ $user->posts_count }}</div>
                                        <div class="text-muted small">Posts</div>
                                    </div>
                                    <div class="flex-grow-1 p-3">
                                        <div class="font-weight-bold">{{ $user->followers_count }}</div>
                                        <div class="text-muted small">Followers</div>
                                    </div>
                                    <div class="flex-grow-1 p-3">
                                        <div class="font-weight-bold">{{ $user->friends_count }}</div>
                                        <div class="text-muted small">Friends</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Personal Info</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-2"><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</div>
                                <div class="mb-2"><strong>Designation:</strong> {{ $user->designation->name ?? 'None' }}
                                </div>
                                <div class="mb-2"><strong>Bio:</strong> {{ $user->profile->bio ?? 'No bio provided' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Activity History -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recent Activity</h3>
                            </div>
                            <div class="card-body">
                                <div class="divide-y">
                                    <div>
                                        <h4 class="mb-3">Latest Posts</h4>
                                        @forelse($user->posts as $post)
                                            <div class="row align-items-center mb-2">
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>{{ Str::limit(strip_tags($post->content), 80) }}</strong>
                                                    </div>
                                                    <div class="text-secondary small">{{ $post->created_at ? $post->created_at->diffForHumans() : 'Unknown date' }}
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <span class="badge bg-blue-lt">{{ $post->comments_count }} replies</span>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted">No posts found.</p>
                                        @endforelse
                                    </div>

                                    <div class="mt-4">
                                        <h4 class="mb-3">Recent Comments</h4>
                                        @forelse($user->comments as $comment)
                                            <div class="row align-items-center mb-2">
                                                <div class="col">
                                                    <div class="text-secondary">
                                                        On post: <a href="{{ route('posts.show', $comment->post_id) }}"
                                                            target="_blank">#{{ $comment->post_id }}</a>
                                                    </div>
                                                    <div class="text-truncate">{{ $comment->content }}</div>
                                                    <div class="text-secondary small">
                                                        {{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Unknown date' }}</div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted">No comments found.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-red text-white avatar"><i class="ti ti-heart"></i></span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">Total Reactions</div>
                                                <div class="text-muted">{{ $user->reactions_count }} given</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-yellow text-white avatar"><i
                                                        class="ti ti-message"></i></span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">Total Feedback</div>
                                                <div class="text-muted">{{ $user->comments_count }} comments</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection