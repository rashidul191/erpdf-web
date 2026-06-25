@php
    $menus = \App\Models\MenuItem::whereNull('menu_id')
        ->whereNull('menu_manage_id')
        ->whereNull('sub_menu_id')
        ->with([
            'page',
            'subMenus' => function ($q) {
                $q->orderBy('serial')
                    ->with([
                        'page',
                        'subOfSubMenus' => function ($q) {
                            $q->orderBy('serial')->with('page');
                        }
                    ]);
            }
        ])
        ->orderBy('serial')
        ->get();
@endphp
<!-- HEADER START -->

<style>
    /* Google Tranlate Switch CSS Code Start */
    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent !important;
        font-size: 0;
    }

    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    .skiptranslate iframe {
        display: none !important;
    }

    body {
        top: 0px !important;
    }

    #langSwitcher {
        border: 1px solid #ddd;
        padding: 5px 10px;
        cursor: pointer;
    }

     .language-switcher{
        display: flex;
     }

    .language-switcher button {
        padding: 0 10px;
        border: 1px solid #ddd;
        background: #fff;
        cursor: pointer;
    }

    .language-switcher button.active {
        background: #198754;
        color: #fff;
    }

    /* Google Tranlate Switch CSS Code End */

    .submenu:hover ul.subofsubmenu {
        visibility: visible !important;
        opacity: 100 !important;
    }

    @media (max-width: 991px) {

        /* Level 3 hidden */
        .submenu .subofsubmenu {
            display: none;
            padding-left: 15px;
            margin-top: 5px;
        }

        /* show when active */
        .submenu.open>.subofsubmenu {
            display: block !important;
        }

        /* arrow */
        .submenu-arrow {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 14px;
            cursor: pointer;
            user-select: none;
            transition: 0.3s;
        }

        .submenu.open>.submenu-arrow {
            transform: rotate(90deg);
        }

        .submenu {
            position: relative;
        }
    }
</style>

<!-- Main Header-->
<header class="main-header {{ request()->routeIs('home.index') ? '' : 'style-two' }} ">

    <!-- Header Top -->
    <x-top-navbar></x-top-navbar>

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
                                <li class="{{ request()->routeIs('home.index') ? 'active' : '' }}">
                                    <a href="{{ route('home.index') }}">Home</a>
                                </li>
                                <x-menu-item :menus="$menus" />
                            </ul>

                            {{-- translate sytem --}}
                            <div>
                                <div class="language-switcher">
                                    <button type="button" id="btnBn">বাংলা</button>
                                    <button type="button" id="btnEn">English</button>
                                </div>
                                {{-- <select id="langSwitcher">
                                    <option value="en" selected>English</option>
                                    <option value="bn">বাংলা</option>
                                </select> --}}
                            </div>

                            <!-- hidden loader -->
                            <div id="google_translate_element" style="visibility: hidden"></div>
                        </div>
                    </nav>
                </div>

                <!-- Outer Box -->
                <div class="outer-box">
                    <!-- Search Btn -->
                    {{-- <div class="search-box-btn search-box-outer">
                        <span class="icon icofont-search"></span>
                    </div> --}}
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
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
<!--End Main Header -->

<script>
    // Menu js code Start
    document.addEventListener("DOMContentLoaded", function () {

        if (window.innerWidth <= 991) {
            document.querySelectorAll(".submenu").forEach(function (item) {
                let childMenu = item.querySelector(".subofsubmenu");
                if (!childMenu) return;
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
                        let parent = item.closest("ul");
                        parent.querySelectorAll(".submenu").forEach(function (el) {
                            if (el !== item) {
                                el.classList.remove("open");
                            }
                        });

                        // toggle current
                        item.classList.toggle("open");
                    });
                }
            });
        }
    });
    // Menu js code Start
</script>
