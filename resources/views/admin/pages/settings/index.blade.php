@extends('admin.layout.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Global Settings</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tab">
                            <li class="nav-item">
                                <a href="#tab-general" class="nav-link active" data-bs-toggle="tab">General Settings</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-logos" class="nav-link" data-bs-toggle="tab">Logos & Assets</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-frontend" class="nav-link" data-bs-toggle="tab">Frontend Sections</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- General Settings -->
                            <div class="tab-pane fade show active" id="tab-general">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">App Name</label>
                                        <input type="text" name="app_name" class="form-control" value="{{ $settings['app_name'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Website Name</label>
                                        <input type="text" name="website_name" class="form-control" value="{{ $settings['website_name'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Website Global Color</label>
                                        <input type="color" name="website_color" class="form-control form-control-color" value="{{ $settings['website_color'] ?? '#007bff' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Maintenance Mode</label>
                                        <select name="maintenance_mode" class="form-select">
                                            <option value="off" {{ ($settings['maintenance_mode'] ?? '') == 'off' ? 'selected' : '' }}>Off</option>
                                            <option value="on" {{ ($settings['maintenance_mode'] ?? '') == 'on' ? 'selected' : '' }}>On</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Support Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $settings['email'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Support Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control" value="{{ $settings['country'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Timezone</label>
                                        <input type="text" name="timezone" class="form-control" value="{{ $settings['timezone'] ?? 'Asia/Dhaka' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Logos & Assets -->
                            <div class="tab-pane fade" id="tab-logos">
                                <div class="row">
                                    <div class="col-md-4 mb-3 text-center">
                                        <label class="form-label">Header Logo</label>
                                        @if(isset($settings['header_logo']))
                                            <img src="{{ asset($settings['header_logo']) }}" class="img-thumbnail mb-2" style="height: 100px;">
                                        @endif
                                        <input type="file" name="header_logo" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <label class="form-label">Footer Logo</label>
                                        @if(isset($settings['footer_logo']))
                                            <img src="{{ asset($settings['footer_logo']) }}" class="img-thumbnail mb-2" style="height: 100px;">
                                        @endif
                                        <input type="file" name="footer_logo" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <label class="form-label">Favicon</label>
                                        @if(isset($settings['favicon']))
                                            <img src="{{ asset($settings['favicon']) }}" class="img-thumbnail mb-2" style="height: 40px;">
                                        @endif
                                        <input type="file" name="favicon" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <label class="form-label">Loading GIF</label>
                                        @if(isset($settings['loading_gif']))
                                            <img src="{{ asset($settings['loading_gif']) }}" class="img-thumbnail mb-2" style="height: 100px;">
                                        @endif
                                        <input type="file" name="loading_gif" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <label class="form-label">App Logo</label>
                                        @if(isset($settings['app_logo']))
                                            <img src="{{ asset($settings['app_logo']) }}" class="img-thumbnail mb-2" style="height: 100px;">
                                        @endif
                                        <input type="file" name="app_logo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Frontend Sections -->
                            <div class="tab-pane fade" id="tab-frontend">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-check form-switch border p-3 rounded">
                                            <input type="hidden" name="show_posts" value="off">
                                            <input class="form-check-input" type="checkbox" name="show_posts" value="on" {{ ($settings['show_posts'] ?? 'on') == 'on' ? 'checked' : '' }}>
                                            <span class="form-check-label">Show Posts Section</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-check form-switch border p-3 rounded">
                                            <input type="hidden" name="show_partners" value="off">
                                            <input class="form-check-input" type="checkbox" name="show_partners" value="on" {{ ($settings['show_partners'] ?? 'on') == 'on' ? 'checked' : '' }}>
                                            <span class="form-check-label">Show Partners Section</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-check form-switch border p-3 rounded">
                                            <input type="hidden" name="show_friend_suggestions" value="off">
                                            <input class="form-check-input" type="checkbox" name="show_friend_suggestions" value="on" {{ ($settings['show_friend_suggestions'] ?? 'on') == 'on' ? 'checked' : '' }}>
                                            <span class="form-check-label">Show Friend Suggestions</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-check form-switch border p-3 rounded">
                                            <input type="hidden" name="show_recent_activity" value="off">
                                            <input class="form-check-input" type="checkbox" name="show_recent_activity" value="on" {{ ($settings['show_recent_activity'] ?? 'on') == 'on' ? 'checked' : '' }}>
                                            <span class="form-check-label">Show Recent Activity</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
