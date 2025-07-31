<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="id" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="auth_id" content="{{ auth()->user()->id }}">
    <meta name="url" content="{{ public_path() }}">


    <title>Chatting Application</title>
    <link rel="icon" type="image/png" href="{{ asset('message/assets/images/chat_list_icon.png') }}">
    <link rel="stylesheet" href="{{ asset('message/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('message/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('message/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('message/assets/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('message/assets/css/emojionearea.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">

    <link rel="stylesheet" href="{{ asset('message/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('message/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('message/assets/css/responsive.css') }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/js/messenger.js'])
</head>

<body>

    <!--==================================
        Chatting Application Start
    ===================================-->
    @yield('contents')
    <!--==================================
        Chatting Application End
    ===================================-->


    <!--jquery library js-->
    <script src="{{ asset('message/assets/js/jquery-3.7.1.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('message/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('message/assets/js/Font-Awesome.js') }}"></script>
    <script src="{{ asset('message/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('message/assets/js/venobox.min.js') }}"></script>
    <script src="{{ asset('message/assets/js/emojionearea.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--main/custom js-->
    <script src="{{ asset('message/assets/js/main.js') }}"></script>
    <script>
        var notyf = new Notyf({
            duration: 5000
        });
    </script>
    @stack('scripts')
</body>

</html>
