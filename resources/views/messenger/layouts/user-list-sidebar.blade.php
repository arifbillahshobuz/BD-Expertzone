<div class="wsus__user_list">
    <div class="wsus__user_list_header">
        <h3>
            <span><img src="{{ asset('assets/images/chat_list_icon.png') }}" alt="Chat" class="img-fluid"></span>
            MESSENGER
        </h3>
        <div class="d-flex">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')"
                    onclick="event.preventDefault();
                this.closest('form').submit();" style="padding-right: 4px;">
                    <span class="setting">
                        <i class="fas fa-sign-out-alt" style="color: red"></i>
                    </span></a>
            </form>


            <span class="setting" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-user-cog"></i>
            </span>
        </div>
        @include('messenger.layouts.profile-modal')
    </div>

    {{-- Search Form  --}}
    @include('messenger.layouts.search-form')

    <div class="wsus__favourite_user">
        <div class="top">favourites</div>
        <div class="row favourite_user_slider">
            @foreach ($favoriteList as $item)
                <div class="col-xl-3 messenger-list-item" role="button" data-id="{{ $item->user?->id }}">
                    <div class="wsus__favourite_item">
                        <div class="img">
                            <img src="{{ asset($item->user?->avatar) }}" alt="User" class="img-fluid">
                            <span class="inactive"></span>
                        </div>
                        <p>{{ $item->user->name }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="wsus__save_message">
        <div class="top">your space</div>
        <div class="wsus__save_message_center messenger-list-item" data-id="{{ auth()->user()->id }}">
            <div class="icon">
                <i class="far fa-bookmark"></i>
            </div>
            <div class="text">
                <h3>Saved Messages</h3>
                <p>Save messages secretly</p>
            </div>
            <span>you</span>
        </div>
    </div>

    <div class="wsus__user_list_area">
        <div class="top">All Messages</div>

        <div class="wsus__user_list_area_height messenger-contacts">


        </div>

        <!-- <div class="wsus__user_list_liading">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div> -->

    </div>
</div>
