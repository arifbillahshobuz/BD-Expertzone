@extends('admin.layout.layout')
@section('page-style')
    Post Category list
@endsection
@section('content')
    @include('components.post-category-list')
    @include('components.post-category-create-modal')
@endsection
