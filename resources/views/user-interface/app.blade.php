@extends('user-interface.layout.layout')
@section('title')
    Home
@endsection

@section('content')
    <div class="row gx-4">
        <div class="col-lg-8" id="dynamicDivContainer">
            <div id="content">
                {{-- Create post From  --}}

                @include('user-interface.pages.post.add-post')


                {{-- Show All job post --}}

                @include('user-interface.pages.post.show-post')


            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="position: sticky; top: 20px; ">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">All jobs</h4>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-inline m-0 p-0">
                        <li class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('frontend/') }}/assets/images/user/02.jpg" alt="story-img"
                                class="avatar-60 avatar-borderd object-cover avatar-rounded img-fluid d-inline-block">
                            <div>
                                <h5 class="d-inline-block">Darlene Robertson</h5>
                                <span class="profile-status-online"></span>
                                <small class="text-capitalize d-block">Active</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
