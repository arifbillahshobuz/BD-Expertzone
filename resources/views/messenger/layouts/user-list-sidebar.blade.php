<div class="wsus__user_list">
    <div class="wsus__user_list_header px-3 pt-3">
        <h3 class="mb-0">
            MESSENGER
        </h3>
        <div class="d-flex align-items-center">
            <span class="setting me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-user-cog"></i>
            </span>
            <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                @csrf
                <a href="javascript:;" onclick="this.closest('form').submit();" title="Sign out">
                    <span class="setting">
                        <i class="fas fa-sign-out-alt text-danger"></i>
                    </span>
                </a>
            </form>
        </div>
        @include('messenger.layouts.profile-modal')
    </div>

    {{-- Search Form --}}
    <div class="px-3 pb-3">
        @include('messenger.layouts.search-form')
    </div>

    <div class="wsus__divider text-center mb-3">
        <span>Favourites</span>
    </div>

    <div class="wsus__favourite_user mb-4">
        <div class="row favourite_user_slider px-3">
            @forelse ($favoriteList as $item)
                <div class="col-3 messenger-list-item" role="button" data-id="{{ $item->user?->id }}">
                    <div class="wsus__favourite_item text-center">
                        <div class="img mx-auto mb-1">
                            <img src="{{ asset($item->user?->avatar ?: 'frontend/assets/images/user/1.jpg') }}" alt="User"
                                class="img-fluid rounded-circle border">
                            <span class="{{ $item->user?->isOnline() ? 'active' : 'inactive' }}"></span>
                        </div>
                        <p class="small text-truncate mb-0 px-1">{{ $item->user?->name }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted small">No favorites yet</div>
            @endforelse
        </div>
    </div>

    <div class="wsus__divider text-center mb-3">
        <span>Your Space</span>
    </div>

    <div class="wsus__save_message px-3 mb-4">
        <div class="wsus__save_message_center messenger-list-item d-flex align-items-center p-2 rounded"
            data-id="{{ auth()->user()->id }}" style="cursor: pointer;">
            <div class="icon-circle bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center me-3"
                style="width: 48px; height: 48px;">
                <i class="far fa-bookmark text-primary"></i>
            </div>
            <div class="text flex-grow-1">
                <h3 class="h6 mb-0 fw-bold">Saved Messages</h3>
                <p class="small text-muted mb-0 font-size-12">Save messages secretly</p>
            </div>
            <span class="text-muted small">you</span>
        </div>
    </div>

    <div class="wsus__divider text-center mb-3">
        <span>All Messages</span>
    </div>

    <div class="wsus__user_list_area">
        <div class="wsus__user_list_area_height messenger-contacts">
            {{-- Contacts will be loaded here via AJAX --}}
        </div>
    </div>
</div>

<style>
    .wsus__divider {
        position: relative;
        z-index: 1;
    }

    .wsus__divider:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 1px;
        background: #eee;
        left: 0;
        top: 50%;
        z-index: -1;
    }

    .wsus__divider span {
        background: #fff;
        padding: 0 15px;
        color: #999;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    [data-bs-theme="dark"] .wsus__divider span {
        background: #1e1e2e;
        color: #666;
    }

    [data-bs-theme="dark"] .wsus__divider:before {
        background: #333;
    }

    .user_search_result {
        position: absolute;
        z-index: 1000;
        width: 100%;
        height: calc(100% - 130px);
        top: 130px;
        left: 0;
        background: #fff;
        border-top: 1px solid #eee;
        transition: all 0.3s ease;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        overflow-y: auto;
    }

    .wsus__user_list.show_search_list .user_search_result {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .wsus__favourite_item .img {
        position: relative;
        width: 50px;
        height: 50px;
        margin: 0 auto;
    }

    .wsus__favourite_item .img img {
        width: 100%;
        height: 100%;
        object-fit: cover !important;
        border-radius: 50%;
    }

    .wsus__favourite_item .img span {
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid #fff;
        bottom: 2px;
        right: 2px;
    }

    .wsus__favourite_item .img .active {
        background: #2ecc71;
    }

    .wsus__favourite_item .img .inactive {
        background: #95a5a6;
    }

    .wsus__save_message_center:hover {
        background: #f0f2f5;
    }
</style>