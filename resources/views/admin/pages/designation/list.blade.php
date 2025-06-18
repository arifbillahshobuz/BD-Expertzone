@extends('admin.layout.layout')
@section('page-style')
    designation list
@endsection
@section('content')
    @include('components.designation-list')
    @include('components.designation-create-modal')
@endsection
