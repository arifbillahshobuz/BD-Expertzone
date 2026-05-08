@extends('user-interface.layout.layout')

@section('title', 'Relative Friends')

@section('content')
    <div class="header-for-bg mb-4">
        <div class="background-header position-relative">
            <img src="{{ asset('frontend/assets/images/page-img/profile-bg2.jpg') }}" class="img-fluid w-100 rounded"
                alt="header-bg" loading="lazy" style="height: 200px; object-fit: cover;">
            <div class="title-on-header position-absolute" style="bottom: 20px; left: 30px;">
                <div class="data-block">
                    <h2 class="text-white">Relative Friends ({{ $relativeFriends->count() }})</h2>
                    <p class="text-white">People with same designation as you</p>
                </div>
            </div>
        </div>
    </div>

    @if ($relativeFriends->count() > 0)
        <div class="row row-cols-sm-1 row-cols-md-2">
            @foreach ($relativeFriends as $user)
                <div class="col" id="relative-user-{{ $user->id }}">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body profile-page p-0">
                            <div class="profile-header-image">
                                <div class="cover-container">
                                    <img src="{{ asset('frontend/assets/images/page-img/profile-bg1.jpg') }}" alt="profile-bg"
                                        class="rounded-top img-fluid w-100" loading="lazy"
                                        style="height: 120px; object-fit: cover;">
                                </div>
                                <div class="profile-info p-4">
                                    <div class="user-detail">
                                        <div class="d-flex flex-wrap justify-content-between align-items-start">
                                            <div class="profile-detail d-flex">
                                                <div class="profile-img pe-lg-4" style="margin-top: -50px;">
                                                    <img src="{{ asset($user->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                                                        alt="profile-img" loading="lazy"
                                                        class="avatar-130 img-fluid rounded-circle border border-white border-3">
                                                </div>
                                                <div class="user-data-block mt-md-0 mt-2">
                                                    <h4>
                                                        <a
                                                            href="{{ route('user.profile.show', $user->username) }}">{{ $user->name }}</a>
                                                    </h4>
                                                    <h6>{{ $user->designation->title ?? '@member' }}</h6>
                                                    <p class="mb-2 mb-lg-0">{{ Str::limit($user->bio ?? 'Hi there!', 45) }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                @php
                                                    $friendshipStatus = 'none';
                                                    if (auth()->user()->friends()->where('friend_id', $user->id)->exists()) {
                                                        $friendshipStatus = 'friends';
                                                    } elseif (auth()->user()->sentFriendRequests()->where('receiver_id', $user->id)->where('status', 'pending')->exists()) {
                                                        $friendshipStatus = 'request_sent';
                                                    } elseif (auth()->user()->receivedFriendRequests()->where('sender_id', $user->id)->where('status', 'pending')->exists()) {
                                                        $friendshipStatus = 'request_received';
                                                    }
                                                @endphp

                                                @if ($friendshipStatus == 'friends')
                                                    <button class="btn btn-light btn-sm d-flex align-items-center gap-1" disabled>
                                                        <i class="ph ph-check-circle"></i> Friends
                                                    </button>
                                                @elseif($friendshipStatus == 'request_sent')
                                                    <button class="btn btn-secondary btn-sm d-flex align-items-center gap-1" disabled>
                                                        <i class="ph ph-clock"></i> Pending
                                                    </button>
                                                @elseif($friendshipStatus == 'request_received')
                                                    <button class="btn btn-primary btn-sm d-flex align-items-center gap-1"
                                                        onclick="acceptFriendRequest('{{ $user->id }}')">
                                                        <i class="ph ph-user-plus"></i> Accept
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-1"
                                                        onclick="sendFriendRequest('{{ $user->id }}')" id="addFriendBtn{{ $user->id }}">
                                                        <i class="ph ph-user-plus"></i> Add Friend
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card">
            <div class="card-body text-center py-5">
                <span class="material-symbols-outlined text-muted" style="font-size:48px">people</span>
                <h5 class="mt-3 text-muted">No Relative Friends Found</h5>
                <p class="text-muted">Users with the same designation will appear here.</p>
            </div>
        </div>
    @endif
@endsection