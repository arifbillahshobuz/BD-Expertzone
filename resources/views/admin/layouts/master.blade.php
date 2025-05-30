<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!-- Libs CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.21.0/tabler-icons.min.css"
          integrity="sha512-XrgoTBs7P5YtpkeKqKOKkruURsawIaRrhe8QrcWeMnFeyRZiOcRNjBAX+AQeXOvx9/9fSY32dVct1PccRoCICQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/select2.min.css') }}">

    <!-- CSS files -->
    <link href="{{ asset('assets/admin/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/iziToast.min.css') }}" rel="stylesheet" />

    {{--    Datat Table Css--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />

    @stack('styles')

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

</head>

<body>
<script src="{{ asset('assets/admin/js/demo-theme.min.js') }}"></script>
<div class="page">
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- Dynamic Content -->
    @yield('content')
</div>


{{--Jquery Cdn--}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{--Data Table Cdn--}}
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>

<!-- Libs JS -->
<script src="{{ asset('assets/admin/js/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="{{ asset('assets/admin/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/iziToast.min.js') }}"></script>

<!-- Tabler Core -->
<script src="{{ asset('assets/admin/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('assets/admin/js/demo.min.js') }}" defer></script>
<!-- TinyMce  -->
<script src="{{ asset('assets/frontend/js/tinymce/tinymce.min.js') }}"></script>

<!-- Admin JS -->
<script src="{{ asset('assets/admin/js/default/admin.js') }}"></script>



@stack('scripts')

@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.show({
                message: '{{ $error }}',
                color: 'red',
                position: 'topRight',
            });
        </script>
    @endforeach
@endif
@if(session('success'))
    <script>
        iziToast.show({
            message: '{{ session("success") }}',
            color: 'green',
            position: 'topRight',
        });
    </script>
@endif

@if(session('error'))
    <script>
        iziToast.show({
            message: '{{ session("error") }}',
            color: 'red',
            position: 'topRight',
        });
    </script>
@endif

</body>

</html>
