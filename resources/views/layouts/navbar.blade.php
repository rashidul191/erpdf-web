@php
    $menus = \App\Models\MenuItem::whereNull('menu_id')
        ->whereNull('sub_menu_id')
        ->with([
            'page',
            'subMenus.page',
            'subMenus.subOfSubMenus.page' // 🔥 important
        ])
        ->oldest('serial')
        ->get();


    // dd($menus);
@endphp
<!-- HEADER START -->
{{-- <x-slot name="style"> --}}
    <style>
        /* ======================
   SUB MENU (1st level)
====================== */
        .sub-menu {
            position: absolute;
            top: 100%;
            left: 0;
            display: none;
            background: #fff;
            min-width: 220px;
            z-index: 999;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav li:hover>.sub-menu {
            display: block;
        }

        /* ======================
   SUB MENU LI
====================== */
        .sub-menu li {
            position: relative;
        }

        /* ======================
   SUB OF SUB MENU (RIGHT SIDE FLYOUT)
====================== */
        .sub-of-sub-menu {
            list-style: none;
            position: absolute;
            top: 0;
            left: 100%;
            display: none;
            background: #fff;
            min-width: 220px;
            z-index: 999;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* hover open for desktop */
        .sub-menu li:hover>.sub-of-sub-menu {
            display: block;
        }

        .submenu-arrow {
            display: none;
        }

        /* ======================
   MOBILE FIX (NO BREAK DESIGN)
====================== */

        /* ======================
   MOBILE ONLY ENHANCEMENT
====================== */

        /* MOBILE ONLY */
        @media (max-width: 991px) {

            .sub-of-sub-menu {
                display: none;
                padding-left: 15px;
            }

            .sub-of-sub-menu.show {
                display: block !important;
                animation: fadeSlide 0.25s ease;
            }

            @keyframes fadeSlide {
                from {
                    opacity: 0;
                    transform: translateY(-5px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .sub-menu li {
                position: relative;
            }

            .submenu-arrow {
                display: inline;
                position: absolute;
                right: 10px;
                top: 10px;
                font-size: 14px;
                cursor: pointer;
                transition: 0.3s;
                z-index: 10;
            }

            .sub-menu li.active>.submenu-arrow {
                transform: rotate(90deg);
            }
        }
    </style>
    {{--
</x-slot> --}}





<!-- Main Header-->
<header class="main-header {{ request()->routeIs('home.index') ? '' : 'style-two' }} ">

    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <!-- Top Left -->
                <div class="top-left">
                    <!-- Info List -->
                    <ul class="info-list">
                        <li><a href="mailto:{!! business_setting('navbar_email')  !!}"><span
                                    class="icon icofont-envelope"></span> {!! business_setting('navbar_email') !!}</a>
                        </li>
                        <li><a href="tel:{!! business_setting('navbar_phone')  !!}"><span
                                    class="icon icofont-phone"></span>
                                {!! business_setting('navbar_phone') !!}</a></li>
                        <li><a href="contact.html"><span class="icon icofont-clock-time"></span>
                                {!! business_setting('navbar_date_time') !!}</a></li>
                    </ul>
                </div>

                <!-- Top Right -->
                <div class="top-right pull-right">
                    <!-- Social Box -->
                    <ul class="social-box">
                        <li><a target="_blank" href="{{ business_setting('twitter_link') ?? 'javascript:void(0)' }}"
                                class="icofont-twitter"></a></li>
                        <li><a target="_blank" href="{{ business_setting('fb_link') ?? 'javascript:void(0)' }}"
                                class="icofont-facebook"></a></li>
                        <li><a target="_blank" href="{{ business_setting('instagram_link') ?? 'javascript:void(0)' }}"
                                class="icofont-instagram"></a></li>
                        <li><a target="_blank" href="{{ business_setting('youtube_link') ?? 'javascript:void(0)' }}"
                                class="icofont-play-alt-1"></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container clearfix">

                <div class="pull-left logo-box">
                    <div class="logo">
                        <a href="{{ route('home.index') }}">
                            <img src="{{ business_image('logo') }}" alt="" title="">
                        </a>
                    </div>
                </div>

                <div class="nav-outer pull-left clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse show collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>

                                <!-- <li class="dropdown"><a href="#">Service</a>
                                    <ul>
                                        <li><a href="service.html">Service</a></li>
                                        <li><a href="service-detail.html">Service Detail</a></li>
                                    </ul>
                                </li> -->

                                <li class="dropdown"><a href="#">Projects</a>
                                    <ul>
                                        <li>
                                            <a href="#">Sub Menu</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <!-- Outer Box -->
                <div class="outer-box">
                    <!-- Search Btn -->
                    <div class="search-box-btn search-box-outer"><span class="icon icofont-search"></span></div>
                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span class="icon ti-menu"></span></div>
                </div>

            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon lnr lnr-cross"></span></div>

        <nav class="menu-box">
            <div class="nav-logo">
                <a href="{{ route('home.index') }}">
                    <img src="{{ business_image('logo') }}" alt="" title=""></a>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
<!--End Main Header -->


<header class="site-header header-style-1 mobile-sider-drawer-menu">
    <div class="sticky-header main-bar-wraper">
        <div class="main-bar p-t5">
            <div class="container">
                <div class="logo-header">
                    <div class="logo-header-inner logo-header-one">
                        <a href="{{ route('home.index') }}">
                            <img src="{{ business_image('logo') }}" alt="{{ business_setting('website_name') }}" />
                        </a>
                    </div>
                </div>
                <!-- NAV Toggle Button -->
                <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button"
                    class="navbar-toggler collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar icon-bar-first"></span>
                    <span class="icon-bar icon-bar-two"></span>
                    <span class="icon-bar icon-bar-three"></span>
                </button>
                <!-- ETRA Nav -->

                <!-- MAIN Vav -->
                <div class="header-nav navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{ request()->routeIs('home.index') ? 'active' : '' }}">
                            <a href="{{ route('home.index') }}">Home</a>
                        </li>
                        <x-menu-item :menus="$menus" />
                    </ul>
                </div>

                <div class="extra-nav">
                    <div class="extra-cell">
                        <a href="#" class="contact-slide-show text-white"><i class="fa fa-envelope-o"></i></a>
                    </div>
                    <div class="extra-cell">
                        <a href="#search" class=" text-white">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                    <!-- <div class="extra-cell">
                                    <a href="javascript:;" class="socialicon_show  text-white">
                                    	<i class="fa fa-share-alt"></i>
                                    </a>
                                </div>   	 -->
                </div>
                <!-- ETRA Nav -->

                <!-- Social Nav -->
                <!-- <div class="social_hide">
                                <div class="side-social-nav">
                                     <a href="javascript:void(0)" class="socialicon_close">&times;</a>
                                     <ul class="list-unstyled">
                                        <li><a href="javascript:void(0);" class="fa fa-facebook"><span class="social-tooltip">Facebook</span></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-rss"><span class="social-tooltip">Rss</span></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-linkedin"><span class="social-tooltip">Linkedin</span></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-google-plus"><span class="social-tooltip">Google Plus</span></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-instagram"><span class="social-tooltip">Instagram</span></a></li>
                                    </ul>
                                </div>
                            </div> -->

                <!-- Contact Nav -->
                <div class="contact-slide-hide">
                    <div class="contact-nav">
                        <a href="javascript:void(0)" class="contact_close">&times;</a>
                        <div class="contact-nav-form p-a30">

                            <form method="POST" action="{{ route('contact-form-message.store') }}">
                                @csrf
                                <div class="contact-one m-b30">

                                    <!-- TITLE START -->
                                    <div class="section-head text-center">
                                        <h2 class="m-b5" data-title="Form">Get In Touch</h2>
                                    </div>
                                    <!-- TITLE END -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group wt-inputicon-box">
                                                <input name="name" type="text" required class="form-control"
                                                    placeholder="Name">
                                                <i class="fs-input-icon sl-icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group wt-inputicon-box">
                                                <input name="email" type="text" class="form-control" required
                                                    placeholder="Email">
                                                <i class="fs-input-icon sl-icon-envolope-letter"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group wt-inputicon-box">
                                                <textarea name="message" rows="3" class="form-control " required
                                                    placeholder="Message"></textarea>
                                                <i class="fs-input-icon sl-icon-envolope"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <button type="submit" class="btn-half site-button button-lg m-b15">
                                                    <span>Submit</span><em></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="contact-info text-black m-b30">
                                <!-- TITLE START -->
                                <div class="section-head text-center">
                                    <h2 class="m-b5" data-title="Info">Contact Info</h2>
                                </div>
                                <!-- TITLE END -->
                                <ul>
                                    <li>
                                        <div class="wt-icon-box-wraper center p-b40">
                                            <div class="icon-md m-b20"><i class="sl-icon-phone"></i></div>
                                            <div class="icon-content">
                                                <h5 class="m-t0 font-weight-500">Phone number</h5>
                                                <p>{{ business_setting('phone') }}</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="wt-icon-box-wraper center p-b40">
                                            <div class="icon-md m-b20"><i class="sl-icon-envolope-letter"></i></div>
                                            <div class="icon-content">
                                                <h5 class="m-t0 font-weight-500">Email address</h5>
                                                <p>{{ business_setting('email') }}</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="wt-icon-box-wraper center">
                                            <div class="icon-md m-b20"><i class="sl-icon-map"></i></div>
                                            <div class="icon-content">
                                                <h5 class="m-t0 font-weight-500">Address info</h5>
                                                <p>{{ business_setting('address') }}</p>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SITE Search -->
                <div id="search">
                    <span class="close"></span>
                    <form role="search" id="searchform" action="" method="get" class="radius-xl">
                        <div class="input-group">
                            <input value="" name="search_text" type="search" placeholder="Type to search" />
                            <span class="input-group-btn"><button type="submit" class="search-btn"><i
                                        class="fa fa-search"></i></button></span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- HEADER END -->
{{-- <x-slot name="script"> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.querySelectorAll(".sub-menu li").forEach(item => {

                let child = item.querySelector(".sub-of-sub-menu");

                if (child) {

                    // avoid duplicate arrow
                    if (!item.querySelector(".submenu-arrow")) {

                        let arrow = document.createElement("span");
                        arrow.classList.add("submenu-arrow");
                        arrow.innerHTML = "&#9656;";

                        item.appendChild(arrow);

                        arrow.addEventListener("click", function (e) {
                            e.preventDefault();
                            e.stopPropagation();

                            // close siblings
                            item.parentElement.querySelectorAll(".sub-of-sub-menu").forEach(el => {
                                if (el !== child) {
                                    el.classList.remove("show");
                                    if (el.parentElement) {
                                        el.parentElement.classList.remove("active");
                                    }
                                }
                            });

                            // toggle current
                            child.classList.toggle("show");
                            item.classList.toggle("active");
                        });
                    }
                }
            });

        });
    </script>
    {{--
</x-slot> --}}
