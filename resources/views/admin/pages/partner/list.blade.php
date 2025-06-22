@extends('admin.layout.layout')
@section('page-style')
    designation list
@endsection
@section('content')
    @include('components.partner-list')
    @include('components.partner-create-modal')
@endsection

