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
                        @foreach ($roomCategories as $item)
                        <li class="btn-filter" data-filter=".{{ $item->slug }}">{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="container-fluid">
                <!-- IMAGE CAROUSEL START -->
                <div class="section-content">
                    <div class="owl-carousel owl-carousel-filter2 owl-btn-bottom-center">

                        @foreach ($rooms as $item )
                        <!-- COLUMNS 1 -->
                        <div class="item {{ $item->category->slug }}">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">{{ $item->name }}</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <!-- <span>TK{{ $item->price }}/night</span> -->
                                        <span>TK {{ number_format($item->price) }}</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> {{ $item->size }}m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Duration:</strong> {{ $item->time_duration }} </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> {{ $item->view }} </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="{{ route('room.show', [$item->id, $item->slug]) }}" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- ROOMS  SLIDER END -->

        <!-- OUR BLOG START -->
        @include('front-end.blog-page-section.blogs')
        <!-- OUR BLOG END -->

        <!-- OUR SPECIALLIZATION START -->
        @include('front-end.about-page-section.specialization')
        <!-- OUR SPECIALLIZATION END -->

        <!-- OUR SERVICES START -->
        @include('front-end.about-page-section.services')
        <!-- OUR SERVICES END -->

        <!-- TESTIMONIALS SECTION START -->
        @include('front-end.home.testimonial')
        <!-- TESTIMONIALS SECTION END -->

        <!-- OUR TEAM START -->
        @include('front-end.about-page-section.ourteam')
        <!-- OUR TEAM END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>