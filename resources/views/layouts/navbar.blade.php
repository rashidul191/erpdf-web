<!-- HEADER START -->
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
                        <li class="{{ request()->routeIs('project-progress.index') ? 'active' : '' }}">
                            <a href="{{ route('project-progress.index') }}">Project Progress</a>
                        </li>
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


                        <li class="{{ request()->routeIs('blog.index') ? 'active' : '' }}">
                            <a href="{{ route('blog.index') }}">Blog</a>
                            <!-- <ul class="sub-menu">
                                <li>
                                    <a href="javascript:;">Blog</a>
                                    <ul class="sub-menu has-child">
                                        <li><a href="news-grid.html">Blog Grid</a></li>
                                        <li><a href="news-listing.html">Blog Listing</a></li>
                                        <li><a href="news-masonry.html">Blog Masonry</a></li>
                                    </ul>
                                </li>

                            </ul> -->
                        </li>
                        <!-- <li>
                            <a href="javascript:;">Projects</a>
                            <ul class="sub-menu">
                                <li><a href="work-grid.html">Project Grid</a></li>
                                <li><a href="work-masonry.html">Project Masonry</a></li>
                                <li><a href="work-carousel.html">Project Carousel</a></li>
                                <li><a href="project-detail.html">Project Detail</a></li>
                            </ul>
                        </li> -->

                        <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
                            <a href="{{ route('contact.index') }}">Contact Us</a>
                        </li>
                        <!-- <li class="submenu-direction">
                                        <a href="javascript:;">Shortcodes</a>
                                        <ul class="sub-menu">
                                            <li><a href="accordian.html">Accordian</a></li>
                                            <li><a href="button.html">Button</a></li>
                                            <li><a href="icon_box.html">Icon box style</a></li>
                                            <li><a href="list_group.html">List group</a></li>
                                            <li><a href="modal_popup.html">Modal popup</a></li>
                                            <li><a href="tabs.html">Tabs</a></li>
                                            <li><a href="table.html">Table</a></li>
                                            <li><a href="video.html">Video  </a></li>
                                            <li><a href="icon-font.html">Icon Font </a></li>
                                        </ul>
                                    </li>                                 -->
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
