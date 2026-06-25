<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ business_image('meta_icon') }}" type="image/x-icon">


    @php
        $page_link = request()->path();
        $dynamicSEO = \App\Models\DynamicSEO::where('page_link', $page_link)->first();
    @endphp

    @if($dynamicSEO)
    <!--- Dynamic SEO Mete Start --->
    {!! $dynamicSEO->meta_script !!}
    <!--- Dynamic SEO Mete End --->
    @else
    <!--- Generated Mete Start --->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="keyword" content="Laravel Dynamic Websit">
    <meta name="description" content="Laravel Dynamic Websit">
    <!--- Generated Mete End --->
    @endif

    <!-- Stylesheets -->
    <link href="{{ asset('front-end/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets/css/responsive.css') }}" rel="stylesheet">

    <!-- Fonts -->
    {{--
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;500;600;700;900&amp;family=Libre+Baskerville:wght@400;700&amp;family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&amp;family=Sacramento&amp;display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{ $style ?? '' }}

    <!-- Scripts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdn.tailwindcss.com/3.2.4"></script> -->
</head>

<body>
    <x-notify-session />

    @if (request()->getPathInfo() != '/login' && request()->getPathInfo() != '/register')
        {{-- Navbar Section Start --}}
        @include('layouts.navbar')
        {{-- Navbar Section End --}}
    @endif

    <div class="page-wrapper">

        {{ $slot }}

        @if (request()->getPathInfo() != '/login' && request()->getPathInfo() != '/register')
            {{-- Footer Section Start --}}
            <x-footer />
            {{-- Footer Section End --}}
        @endif

    </div>



    <!-- Search Popup -->
    <div class="search-popup">
        <button class="close-search style-two"><span class="icofont-brand-nexus"></span></button>
        <button class="close-search"><span class="icofont-arrow-up"></span></button>
        <form method="post" action="https://htmldemo.net/consultix/consultix/blog.html">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Header Search -->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>


    <!-- JAVASCRIPT  FILES ========================================= -->
    <script src="{{ asset('front-end/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
        $(document).ready(function () {
            $('.select2').select2();
            $('.select2-multiple').select2();
            // $('#username-select').select2({
            //     placeholder: 'Select or search a username',
            //     allowClear: true,
            //     width: 'resolve'
            // });
        });
    </script>

    <!-- JS here -->
    <script src="{{ asset('front-end/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/appear.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/owl.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/wow.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/script.js') }}"></script>

    <!-- Bootstrap toast js code -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.getElementById('liveToast');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    </script>


    {{-- Google Langulate Switch JS Codes Start --}}
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,bn',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>

    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    {{-- <script>
        document.getElementById("langSwitcher").addEventListener("change", function () {
            const lang = this.value;
            localStorage.setItem("selectedLang", lang);
            changeLang(lang);
        });

        function changeLang(lang) {
            const googTransCookie = "/en/" + lang;

            document.cookie = "googtrans=" + googTransCookie + ";path=/";
            document.cookie = "googtrans=" + googTransCookie + ";domain=" + window.location.hostname + ";path=/";

            location.reload();
        }



        window.addEventListener("load", function () {
            const savedLang = localStorage.getItem("selectedLang");

            if (savedLang) {
                document.getElementById("langSwitcher").value = savedLang;
            }
        });

    </script> --}}
<script>
    function setActiveButton(lang) {
        document.getElementById("btnBn").classList.remove("active");
        document.getElementById("btnEn").classList.remove("active");

        if (lang === "bn") {
            document.getElementById("btnBn").classList.add("active");
        } else {
            document.getElementById("btnEn").classList.add("active");
        }
    }

    function changeLang(lang) {
        const googTransCookie = "/bn/" + lang;

        document.cookie = "googtrans=" + googTransCookie + ";path=/";
        document.cookie = "googtrans=" + googTransCookie + ";domain=" + window.location.hostname + ";path=/";

        localStorage.setItem("selectedLang", lang);

        setActiveButton(lang);

        location.reload();
    }

    document.getElementById("btnBn").addEventListener("click", function () {
        changeLang("bn");
    });

    document.getElementById("btnEn").addEventListener("click", function () {
        changeLang("en");
    });

    window.addEventListener("load", function () {
        let savedLang = localStorage.getItem("selectedLang");

        if (!savedLang) {
            savedLang = "bn";
            localStorage.setItem("selectedLang", "bn");
        }

        document.cookie = "googtrans=/bn/" + savedLang + ";path=/";

        setActiveButton(savedLang);
    });
</script>

    {{-- Google Langulate Switch JS Codes End --}}
    {{ $script ?? '' }}
</body>

</html>
