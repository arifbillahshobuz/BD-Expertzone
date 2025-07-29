@extends('admin.layout.layout')
@section('page-style')
    Post list
@endsection
@section('content')
    @include('components.admin-post-list')
    @include('components.admin-post-create-modal')
@endsection

