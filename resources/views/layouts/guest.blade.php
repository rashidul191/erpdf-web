<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ business_image('meta_icon') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{ $style ?? '' }} <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com/3.2.4"></script>
</head>

<body>

    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" title="Go to top"
        class="fixed bottom-16 right-2 md:right-6 z-50 w-8 h-8 rounded-full bg-[#f26e21] text-white font-bold transition-opacity opacity-0 invisible">
        ↑
    </button>
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
    @endif <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    @if (request()->getPathInfo() != '/login' && request()->getPathInfo() != '/register')
    {{-- Footer Section Start  --}}
    <x-footer />
    {{-- Footer Section End  --}}

    {{-- Mobile Menu Start --}}
    <x-mobile-footer-menu />
    {{-- Mobile Menu End --}}
    @endif


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    {{ $script ?? '' }}
</body>

</html>