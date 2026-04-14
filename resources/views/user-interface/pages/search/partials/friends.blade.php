<div class="row">
    @forelse($users as $user)
        <div class="col-md-6 mb-4">
            <div class="card card-block card-stretch card-height h-100 p-3 h-100">
                <div class="d-flex flex-row align-items-center">
                    <img src="{{ asset($user->avatar ?? 'frontend/assets/images/user/1.jpg') }}"
                        class="avatar-50 rounded-circle img-fluid border border-2 border-primary me-3" loading="lazy">
                    <div class="flex-grow-1">
                        <a href="{{ route('user.profile.show', $user->username) }}">
                            <h6 class="mb-0">{{ $user->name }}</h6>
                        </a>
                        <small class="text-muted">{{ '@' . $user->username }}</small>
                    </div>

                    <a href="{{ route('user.profile.show', $user->username) }}"
                        class="btn btn-primary btn-sm px-3 rounded-pill">View Profile</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card card-block card-stretch card-height mb-4">
                <div class="card-body text-center p-5">
                    <h5 class="text-muted">No people found matching your search.</h5>
                </div>
            </div>
        </div>
    @endforelse
</div>