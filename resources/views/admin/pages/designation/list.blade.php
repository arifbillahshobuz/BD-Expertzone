@extends('admin.layout.layout')
@section('page-style', 'Designation list')
@section('content')
    @include('components.designation-list')
    @include('components.designation-create-modal')
@endsection
