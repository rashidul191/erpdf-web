@php
    $cartItems = session()->get('cart', []);
@endphp

<!-- Navbar -->
<div id="main-navbar" class="bg-white shadow-lg py-2">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">

        <div class="w-full flex justify-between items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home.index') }}" class="text-2xl font-bold text-blue-600">
                    <img class="h-12 md:h-16" src="{{ business_image('logo') }}" alt="logo">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 items-center">

                <a href="{{ route('home.index') }}" class="text-gray-700 font-bold hover:text-blue-600">Home</a>

                <!-- Search Form Start -->
                <x-search-product />
                <!-- Search Form End --> 
                @auth
                    <a href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <a href="/login"><x-button>Login</x-button></a>
                    <a href="/register"><x-button>Register</x-button></a>
                @endauth


            </div>

            <!-- Mobile Cart & Menu Buttons -->
            <div class="md:hidden">

                <!-- Search Form Start -->
                <x-search-product />
                <!-- Search Form End -->

            </div>
    </nav>
</div>
<!-- Mobile Off-Canvas Cart Panel -->

<!-- JS Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        // ✅ Safe element references
        const mobileMenuBtn = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        // ✅ Mobile menu toggle (only if button exists)
        if (mobileMenuBtn && mobileMenu && menuIcon && closeIcon) {
            mobileMenuBtn.addEventListener('click', () => {
                const isOpen = !mobileMenu.classList.contains('hidden');
                if (isOpen) {
                    mobileMenu.classList.add('hidden', 'opacity-0', 'scale-y-95');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    mobileMenu.classList.remove('hidden', 'opacity-0', 'scale-y-95');
                    menuIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            });
        }

        // ✅ Dropdown toggle (desktop)
        function toggleDropdown(id) {
            const dropdown = document.getElementById(`dropdown-${id}`);
            if (dropdown) {
                dropdown.classList.toggle('hidden');
                dropdown.classList.toggle('opacity-0');
                dropdown.classList.toggle('scale-y-95');
            }
        }
        window.toggleDropdown = toggleDropdown; // so button onclick works

        // ✅ Close dropdown when clicked outside
        document.addEventListener('click', function(e) {
            const cartDropdown = document.getElementById('dropdown-desktop-cart');
            const cartWrapper = document.getElementById('cart-dropdown-wrapper');
            if (cartDropdown && !cartWrapper.contains(e.target)) {
                cartDropdown.classList.add('hidden', 'opacity-0', 'scale-y-95');
            }
        });

        // ✅ Mobile Cart panel
        window.openMobileCart = function() {
            const panel = document.getElementById('mobile-cart-panel');
            panel?.classList.remove('translate-x-full');
        };

        window.closeMobileCart = function() {
            const panel = document.getElementById('mobile-cart-panel');
            panel?.classList.add('translate-x-full');
        };

        // ✅ Sticky Navbar on Scroll
        const navbar = document.getElementById('main-navbar');
        if (navbar) {
            const navbarHeight = navbar.offsetHeight;
            window.addEventListener('scroll', function() {
                console.log('scrolling....');

                if (window.scrollY > 150) {
                    navbar.classList.add(
                        'fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-md', 'bg-white/95',
                        'backdrop-blur-md'
                    );
                    document.body.style.paddingTop = navbarHeight + 'px';
                } else {
                    navbar.classList.remove(
                        'fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-md', 'bg-white/95',
                        'backdrop-blur-md'
                    );
                    document.body.style.paddingTop = 0;
                }
            });
        }

    });
</script>

<!-- Optional smooth animation -->
<style>
    @keyframes slideDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-slideDown {
        animation: slideDown 0.3s ease-in-out forwards;
    }
</style>
