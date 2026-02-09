<x-guest-layout>
    <!-- CONTENT START -->
    <div class="page-content">

        <!-- SLIDER START -->
        @include('front-end.home.slider')
        <!-- SLIDER END -->

        <!--BOOKING SECTION START-->
        <div class="section-full p-t25 booking-bar">
            <div class="container">
                <div class="booking-bar-inner site-bg-primary">
                    <div class="booking-fram-name">
                        <h3 class="m-a0">Book A Room</h3>
                    </div>
                    <div class="booking-form">
                        <form>
                            <ul>
                                <li class="date-cal-block">
                                    <div class="form-group clearfix">
                                        <label>In-Out Time</label>
                                        <div class="t-datepicker">
                                            <div class="t-check-in form-control"></div>
                                            <div class="t-check-out form-control"></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="room-type-block">
                                    <div class="form-group">
                                        <label>Room Type</label>
                                        <div class="select-box">
                                            <select class="form-control" name="room">
                                                <option selected="selected" disabled="disabled">Single room</option>
                                                <option value="Single">Single room</option>
                                                <option value="Double">Double Room</option>
                                                <option value="Deluxe">Deluxe room</option>
                                            </select>
                                        </div>
                                    </div>
                                </li>

                                <li class="adult-type-block">
                                    <div class="form-group">
                                        <label>Adult</label>
                                        <div class="select-box">
                                            <select class="form-control" name="No-adult">
                                                <option selected="selected" disabled="disabled">Adult</option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </li>

                                <li class="children-type-block">
                                    <div class="form-group">
                                        <label>Childrens</label>
                                        <div class="select-box">
                                            <select class="form-control" name="No-children">
                                                <option selected="selected" disabled="disabled">Childrens</option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </li>

                                <li class="booking-form-btn-block">
                                    <div class="form-group">
                                        <button type="submit" class="site-button-secondry btn-half"><span> Book</span><em></em></button>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--BOOKING SECTION END-->

        <!-- WELCOME SECTION START -->
        @include('front-end.about-page-section.about-section')
        <!-- WELCOME  SECTION END -->

        <!-- ROOMS SLIDER START -->
        <div class="section-full p-tb90 bg-gray">
            <div class="container">

                <!-- TITLE START -->
                <div class="section-head text-center">
                    <h2 class="m-b5" data-title="Suites">Our Rooms & Suites</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator site-bg-primary"></div>
                    </div>
                </div>
                <!-- TITLE END -->

                <div class="text-center">
                    <ul class="btn-filter-wrap2">
                        <li class="btn-filter btn-active" data-filter="*">All Rooms</li>
                        <li class="btn-filter" data-filter=".colum-1">Classic</li>
                        <li class="btn-filter" data-filter=".colum-1">Superior</li>
                        <li class="btn-filter" data-filter=".colum-3">Delux</li>
                        <li class="btn-filter" data-filter=".colum-4">Executive </li>
                    </ul>
                </div>
            </div>

            <div class="container-fluid">
                <!-- IMAGE CAROUSEL START -->
                <div class="section-content">
                    <div class="owl-carousel owl-carousel-filter2 owl-btn-bottom-center">
                        <!-- COLUMNS 1 -->
                        <div class="item colum-1">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="images/rooms/pic1.jpg" alt="">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">Classic Balcony Room</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <span>$299.00/night</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> 30m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Adult:</strong> 3 </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> balcony </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="room-detail.html" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>

                        <!-- COLUMNS 2 -->
                        <div class="item colum-2">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="images/rooms/pic2.jpg" alt="">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">Superior Double Room</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <span>$399.00/night</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> 30m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Adult:</strong> 3 </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> balcony </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="room-detail.html" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>

                        <!-- COLUMNS 3 -->
                        <div class="item colum-3">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="images/rooms/pic3.jpg" alt="">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">Balcony Double Room</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <span>$299.00/night</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> 30m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Adult:</strong> 3 </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> balcony </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="room-detail.html" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>

                        <!-- COLUMNS 4 -->
                        <div class="item colum-4">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="images/rooms/pic4.jpg" alt="">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">Delux Double Room</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <span>$299.00/night</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> 30m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Adult:</strong> 3 </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> balcony </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="room-detail.html" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>

                        <!-- COLUMNS 5 -->
                        <div class="item colum-3">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="images/rooms/pic5.jpg" alt="">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">Classic Balcony Room</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <span>$299.00/night</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> 30m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Adult:</strong> 3 </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> balcony </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="room-detail.html" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>

                        <!-- COLUMNS 6 -->
                        <div class="item colum-2">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="images/rooms/pic6.jpg" alt="">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">Superior Double Room</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <span>$299.00/night</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> 30m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Adult:</strong> 3 </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> balcony </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="room-detail.html" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>

                        <!-- COLUMNS 7 -->
                        <div class="item colum-1">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="images/rooms/pic7.jpg" alt="">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">Delux Double Room</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <span>$299.00/night</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> 30m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Adult:</strong> 3 </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> balcony </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="room-detail.html" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <!-- ROOMS  SLIDER END -->

        <!-- OUR BLOG START -->
        <div class="section-full p-t90 p-b60 bg-white">

            <div class="container">

                <!-- TITLE START -->
                <div class="section-head text-left">
                    <h2 class="m-b5" data-title="Blog">Our Latest Blog</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator site-bg-primary"></div>
                    </div>
                </div>
                <!-- TITLE END -->

                <!-- IMAGE CAROUSEL START -->
                <div class="section-content">

                    <div class="row">

                        <div class="col-lg-6 col-md-6">
                            <div class="blog-post latest-blog-1 date-style-2">
                                <div class="wt-post-media wt-img-effect zoom-slow">
                                    <a href="post-right-sidebar.html"><img src="images/blog/default/thum4.jpg" alt=""></a>
                                </div>
                                <div class="wt-post-info">
                                    <div class="post-date"> <strong>20 Mar 2024 </strong></div>

                                    <div class="wt-post-meta">
                                        <ul class="clearfix">
                                            <li class="post-author">
                                                <div class="post-author-pic">
                                                    <span><img src="images/testimonials/pic1.jpg" alt=""></span>
                                                    <span><strong> By</strong> <a href="post-right-sidebar.html">Loretta Shelton</a></span>
                                                </div>
                                            </li>
                                            <li class="post-comment"><i class="fa fa fa-comments site-text-primary"></i><a href="post-right-sidebar.html">10 Comment</a> </li>
                                        </ul>
                                    </div>

                                    <div class="wt-post-title">
                                        <h3 class="post-title"><a href="post-right-sidebar.html">Your first source for architecture, dsign and art news.</a></h3>
                                    </div>

                                    <div class="wt-post-text">
                                        <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusd veritatis quisquam laboriosam asperiores, tenetur, blanditiis,quaerat odit ex exercitationem pariatur.</p>
                                    </div>

                                    <div class="readmore-line">
                                        <a href="post-right-sidebar.html" class="site-button-ink site-text-primary font-weight-900 ">Read More</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="blog-post latest-blog-1 date-style-2">
                                <div class="wt-post-media wt-img-effect zoom-slow">
                                    <a href="post-gallery.html"><img src="images/blog/default/thum7.jpg" alt=""></a>
                                </div>
                                <div class="wt-post-info">
                                    <div class="post-date"> <strong>20 Mar 2024 </strong></div>

                                    <div class="wt-post-meta">
                                        <ul class="clearfix">
                                            <li class="post-author">
                                                <div class="post-author-pic">
                                                    <span><img src="images/testimonials/pic2.jpg" alt=""></span>
                                                    <span><strong> By</strong> <a href="post-gallery.html">Loretta Shelton</a></span>
                                                </div>
                                            </li>
                                            <li class="post-comment"><i class="fa fa fa-comments site-text-primary"></i><a href="post-gallery.html">10 Comment</a> </li>
                                        </ul>
                                    </div>

                                    <div class="wt-post-title">
                                        <h3 class="post-title"><a href="post-gallery.html">Your first source for architecture, dsign and art news.</a></h3>
                                    </div>

                                    <div class="wt-post-text">
                                        <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusd veritatis quisquam laboriosam asperiores, tenetur, blanditiis,quaerat odit ex exercitationem pariatur.</p>
                                    </div>

                                    <div class="readmore-line">
                                        <a href="post-gallery.html" class="site-button-ink site-text-primary font-weight-900 ">Read More</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- OUR BLOG END -->

        <!-- OUR SPECIALLIZATION START -->
        @include('front-end.about-page-section.specialization')
        <!-- OUR SPECIALLIZATION END -->

        <!-- OUR SERVICES START -->
        @include('front-end.about-page-section.services')
        <!-- OUR SERVICES END -->


        <!-- TESTIMONIALS SECTION START -->
        <div class="section-full p-tb90  overlay-wraper" style="background-image:url('{{ business_image('client_say_bg_img') }}')">
            <div class="overlay-main opacity-05 bg-black"></div>
            <div class="container">
                <div class="section-content">

                    <!-- TITLE START -->
                    <div class="section-head text-left">
                        <h2 class="m-b5 text-white" data-title="Clients">Our Client Says</h2>
                        <div class="wt-separator-outer">
                            <div class="wt-separator site-bg-primary"></div>
                        </div>
                    </div>
                    <!-- TITLE END -->

                    <!-- TESTIMONIAL 4 START ON BACKGROUND -->
                    <div class="section-content">
                        <div class="testimonial-home owl-carousel  owl-btn-top-right">

                            @foreach ($clientSays as $item)
                            <div class="item">
                                <div class="testimonial-6">
                                    <div class="testimonial-pic-block">
                                        <div class="testimonial-pic">
                                            <img src="{{ asset($item->image) }}" width="132" height="132" alt="{{ $item->name }}">
                                        </div>
                                    </div>
                                    <div class="testimonial-text clearfix text-white">
                                        <div class="testimonial-detail ">
                                            <h4 class="testimonial-name m-t0 m-b10">{{ $item->name }}</h4>
                                        </div>
                                        <div class="testimonial-paragraph text-black p-t5">
                                            <p>“ {!! $item->description !!}</p>
                                        </div>
                                        <div class="testimonial-detail ">
                                            <span class="testimonial-position">{{ $item->address }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIALS SECTION END -->


        <!-- OUR TEAM START -->
        @include('front-end.about-page-section.ourteam')

        <!-- OUR TEAM END -->

    </div>
    <!-- CONTENT END -->



</x-guest-layout>