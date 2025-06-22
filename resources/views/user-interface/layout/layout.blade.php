<!doctype html>
<html lang="en" class="theme-fs-md" data-bs-theme-color="default" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @include('user-interface.partial.style')
    @yield('page-style')

    {!! ToastMagic::styles() !!}
    <!-- Config Options -->

    <meta name="setting_options"
        content='{
    "saveLocal":"sessionStorage",
    "storeKey":"socialV",
    "setting":{
      "theme_scheme_direction":{"value":"ltr"},
      "theme_scheme":{"value":"light"},
      "theme_color":{
        "colors":{
          "--customprimary":"#50b5ff",
          "--custominfo":"#d592ff"
        },
        "value":"theme-color-default"
      },
      "sidebar_type":{"value":[]},
      "sidebar_menu_style":{"value":"navs-rounded-all"},
      "footer":{"value":"default"}
    }
  }'>
    <!-- End Config Options -->
</head>

<body class="">

    <!-- loader Start -->
    {{-- <div id="loading">
    <div id="loading-center">
    </div>
</div> --}}
    <!-- loader END -->
    <!-- Wrapper Start -->
    @include('user-interface.partial.wrapper')
    <!-- Wrapper End-->
    <main class="main-content">
        <div class="position-relative">
            <!-- header start-->
            @include('user-interface.partial.header')
            <!-- header end -->
            <div>
                <div class="position-relative">
                </div>
                <div class="content-inner " id="page_layout">
                    <div class="container">
                        @yield('content')
                    </div>

                    <!-- Like Modal start-->
                    @include('user-interface.partial.likemodal')
                    <!-- Like Modal end-->
                </div>
            </div>
            <!-- sidebar-mini start-->
            @include('user-interface.partial.sidebar-mini')
            <!-- sidebar end -->
            <!-- popup-modal start-->
            @include('user-interface.partial.popupmodal')
            <!-- popup-modal end-->
        </div>
    </main>
    <!-- footer start-->
    @include('user-interface.partial.footer')
    <!-- footer End-->

    <!-- offcanvas start -->

    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->
    @include('user-interface.partial.offcanvas')
    <!-- Settings sidebar end here -->

    <a class="btn btn-fixed-end btn-danger btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas"
        data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
        <span class="icon material-symbols-outlined animated-rotate text-white">
            settings
        </span>
    </a> <!-- Live Customizer end -->

    <!-- Share Modal start-->
    @include('user-interface.partial.share-model')
    <!-- Share Moda end-->


    <!-- offcanvas bottom start-->
    @include('user-interface.partial.offcanvas-bottom')
    <!-- offcanvas bottom end-->

    <!-- Backend Bundle JavaScript -->
    @include('user-interface.partial.script')

    {{-- ToastMagic Scripts --}}
    {!! ToastMagic::scripts() !!}




</body>

</html>
