@extends('user-interface.layout.layout')
@section('title')
    {{ $user->name }} - All Photos
@endsection

@section('page-style')
    <style>
        .photo-grid-item {
            position: relative;
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .photo-grid-item:hover {
            transform: scale(1.02);
        }

        .photo-grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            text-transform: uppercase;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="card-title">All Photos of {{ $user->name }}</h4>
                        </div>
                        <a href="{{ route('user.profile.show', $user->username) }}" class="btn btn-primary btn-sm">
                            <i class="ph ph-arrow-left me-1"></i> Back to Profile
                        </a>
                    </div>
                    <div class="card-body">
                        @if($photos->count() > 0)
                            <div class="row g-3">
                                @foreach($photos as $photo)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="photo-grid-item">
                                            <a data-fslightbox="gallery-all" href="{{ asset($photo['url']) }}" data-type="image">
                                                <img src="{{ asset($photo['url']) }}" class="img-fluid" alt="user-photo"
                                                    loading="lazy">
                                                @if(isset($photo['type']))
                                                    <span class="photo-badge">{{ $photo['type'] }}</span>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="ph ph-image-square fs-1 text-muted"></i>
                                <p class="mt-2 text-muted">No photos found for this user.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection