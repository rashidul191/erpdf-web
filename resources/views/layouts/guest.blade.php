<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ business_image('meta_icon') }}" type="image/x-icon">

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> -->
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/slick-theme.css') }}">


    <link rel="stylesheet" href="{{ asset('front-end/assets/css/bootstrap.min.css') }}"><!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/t-datepicker.min.css') }}"><!-- BOOTSTRAP DATEPICKER STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/t-datepicker-blue.css') }}"><!-- BOOTSTRAP DATEPICKER STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/fontawesome/css/font-awesome.min.css') }}" /><!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/owl.carousel.min.css') }}"><!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/magnific-popup.min.css') }}"><!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/loader.min.css') }}"><!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/style.css') }}"><!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" class="skin" href="{{ asset('front-end/assets/css/skin/skin-1.css') }}"><!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/flaticon.min.css') }}"><!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/switcher.css') }}"><!-- SIDE SWITCHER STYLE SHEET -->


    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/plugins/revolution/revolution/css/settings.css') }}">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/plugins/revolution/revolution/css/navigation.css') }}">


    <link rel="stylesheet" href="{{ asset('front-end/assets/css/custom.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,800,800i,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Text:400,400i&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{ $style ?? '' }}


    <!-- Scripts -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="https://cdn.tailwindcss.com/3.2.4"></script> -->
</head>

<body>
    @if (request()->getPathInfo() != '/login' && request()->getPathInfo() != '/register')
    {{-- Navbar Section Start  --}}
    @include('layouts.navbar')
    {{-- Navbar Section End  --}}
    @endif

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast({
                !!json_encode(session('success')) !!
            }, 'success');
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast({
                !!json_encode(session('error')) !!
            }, 'error');
        });
    </script>
    @endif
    @if (session('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast({
                !!json_encode(session('warning')) !!
            }, 'warning');
        });
    </script>
    @endif
    <div class="font-sans page-wraper">
        {{ $slot }}


        <!-- BUTTON TOP START -->
        <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>
        
        @if (request()->getPathInfo() != '/login' && request()->getPathInfo() != '/register')
        {{-- Footer Section Start  --}}
        <x-footer />
        {{-- Footer Section End  --}}       
        
        @endif
    </div>



    <!-- LOADING AREA START ===== -->
    <!-- <div class="loading-area">
        <div class="loading-box"></div>
        <div class="loading-pic">
            <div class="cssload-thecube">
                <div class="cssload-cube cssload-c1"></div>
                <div class="cssload-cube cssload-c2"></div>
                <div class="cssload-cube cssload-c4"></div>
                <div class="cssload-cube cssload-c3"></div>
            </div>
        </div>
    </div> -->
    <!-- LOADING AREA  END ====== -->


    <!-- JAVASCRIPT  FILES ========================================= -->
    <script src="{{ asset('front-end/assets/js/jquery-3.7.1.min.js') }}"></script><!-- JQUERY.MIN JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ asset('front-end/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/script.js') }}"></script>
    <script>
        function showToast(message, type = 'success') {
            let bgColor = '#4CAF50'; // default green

            if (type === 'error') bgColor = '#F44336'; // red
            else if (type === 'warning') bgColor = '#FF9800'; // orange

            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: bgColor,
                stopOnFocus: true,
                style: {
                    color: "#fff"
                }
            }).showToast();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2-multiple').select2();
            // $('#username-select').select2({
            //     placeholder: 'Select or search a username',
            //     allowClear: true,
            //     width: 'resolve'
            // });
        });
    </script>





    <script src="{{ asset('front-end/assets/js/popper.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('front-end/assets/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('front-end/assets/js/magnific-popup.min.js') }}"></script><!-- MAGNIFIC-POPUP JS -->
    <script src="{{ asset('front-end/assets/js/waypoints.min.js') }}"></script><!-- WAYPOINTS JS -->
    <script src="{{ asset('front-end/assets/js/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
    <script src="{{ asset('front-end/assets/js/waypoints-sticky.min.js') }}"></script><!-- COUNTERUP JS -->
    <script src="{{ asset('front-end/assets/js/isotope.pkgd.min.js') }}"></script><!-- MASONRY  -->
    <script src="{{ asset('front-end/assets/js/imagesloaded.pkgd.min.js') }}"></script><!-- MASONRY  -->
    <script src="{{ asset('front-end/assets/js/owl.carousel.min.js') }}"></script><!-- OWL  SLIDER  -->
    <script src="{{ asset('front-end/assets/js/jquery.owl-filter.js') }}"></script><!-- OWL  SLIDER FIlter -->
    <script src="{{ asset('front-end/assets/js/t-datepicker.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
    <script src="{{ asset('front-end/assets/js/switcher.js') }}"></script><!-- SHORTCODE FUCTIONS  -->

    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('front-end/assets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/plugins/revolution/revolution/js/extensions/revolution-plugin.js') }}"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script src="{{ asset('front-end/assets/js/rev-script-1.js') }}"></script>


    {{ $script ?? '' }}
</body>

</html>