@php
    $menus = \App\Models\Menu::whereNull('menu_id')->orWhere('is_custom', \App\Enums\IsAgreeStatus::Yes())
        ->whereNull('sub_menu_id')
        ->with([
            'page',
            'subMenus.page',
            'subMenus.subOfSubMenus.page' // 🔥 important
        ])
        ->oldest('serial')
        ->get();


    // dd($menus[0]);
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

                        <li class="{{ request()->routeIs('about.index') ? 'active' : '' }}">
                            <a href="{{ route('about.index') }}">About Us</a>
                            <ul class="sub-menu">
                                @foreach (\App\Enums\TeamCategoryType::getInstances() as $key => $value)
                                    <li>
                                        <a
                                            href="{{ route('team-category.show', [$value->value, \Str::lower($value->key)]) }}">{{  $value->key }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        {{-- @foreach ($menus as $menu)
                        <li
                            class="{{ request()->routeIs('menu-page.index') && request()->route('slug') == $menu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? $menu->slug : $menu->page->slug ? 'active' : '' }}">
                            <a
                                href="{{ route('menu-page.index', $menu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? $menu->slug : $menu->page->slug) }}">{{
                                $menu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? $menu->slug : $menu->page->title
                                }}</a>
                            @if($menu->subMenus->isNotEmpty())
                            <ul class="sub-menu">
                                @foreach ($menu->subMenus as $subMenu)
                                <li>
                                    <a
                                        href="{{ route('menu-page.index', $subMenu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? $subMenu->slug : $subMenu->page->slug) }}">{{
                                        $subMenu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? $subMenu->slug :
                                        $subMenu->page->title }}</a>
                                    @if($subMenu->subOfSubMenus->isNotEmpty())
                                    <ul class="sub-of-sub-menu">
                                        @foreach ($subMenu->subOfSubMenus as $subOfSubMenu)
                                        <li>
                                            <a
                                                href="{{ route('menu-page.index', $subOfSubMenu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? $subOfSubMenu->slug : $subOfSubMenu->page->slug) }}">{{
                                                $subOfSubMenu->is_custom == \App\Enums\IsAgreeStatus::Yes() ?
                                                $subOfSubMenu->slug : $subOfSubMenu->page->title }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach --}}


                        @foreach ($menus as $menu)

                            @php
                                $isCustom = $menu->is_custom == \App\Enums\IsAgreeStatus::Yes();
                                $slug = $isCustom ? $menu->slug : ($menu->page->slug ?? '');
                                $title = $isCustom ? $menu->name : ($menu->page->title ?? '');
                            @endphp

                            <li
                                class="{{ request()->routeIs('menu-page.index') && request()->route('slug') == $slug ? 'active' : '' }}">

                                <a href="{{ route('menu-page.index', $slug) }}">
                                    {{ $title }}
                                </a>

                                @if($menu->subMenus->isNotEmpty())
                                    <ul class="sub-menu">

                                        @foreach ($menu->subMenus as $subMenu)

                                            @php
                                                $isCustom = $subMenu->is_custom == \App\Enums\IsAgreeStatus::Yes();
                                                $subSlug = $isCustom ? $subMenu->slug : ($subMenu->page->slug ?? '');
                                                $subTitle = $isCustom ? $subMenu->name : ($subMenu->page->title ?? '');
                                            @endphp

                                            <li>
                                                <a href="{{ route('menu-page.index', $subSlug) }}">
                                                    {{ $subTitle }}
                                                </a>

                                                @if($subMenu->subOfSubMenus->isNotEmpty())
                                                    <ul class="sub-of-sub-menu">

                                                        @foreach ($subMenu->subOfSubMenus as $subOfSubMenu)

                                                            @php
                                                                $isCustom = $subOfSubMenu->is_custom == \App\Enums\IsAgreeStatus::Yes();
                                                                $subOfSubSlug = $isCustom ? $subOfSubMenu->slug : ($subOfSubMenu->page->slug ?? '');
                                                                $subOfSubTitle = $isCustom ? $subOfSubMenu->name : ($subOfSubMenu->page->title ?? '');
                                                            @endphp

                                                            <li>
                                                                <a href="{{ route('menu-page.index', $subOfSubSlug) }}">
                                                                    {{ $subOfSubTitle }}
                                                                </a>
                                                            </li>

                                                        @endforeach

                                                    </ul>
                                                @endif

                                            </li>

                                        @endforeach

                                    </ul>
                                @endif

                            </li>

                        @endforeach
                        @php
                            $roomCategories = \App\Models\RoomCategory::oldest('name')->get();
                        @endphp
                        <li class="{{ request()->routeIs('room-category.*') ? 'active' : '' }}">
                            <a href="javascript:;">Rooms</a>
                            <ul class="sub-menu">
                                @foreach ($roomCategories as $item)
                                    <li><a
                                            href="{{ route('room-category.show', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
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
                    <form role="search" id="searchform" action="{{ route('room.search') }}" method="get"
                        class="radius-xl">
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
