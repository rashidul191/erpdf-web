<x-guest-layout>

    @php
        $isShow = \App\Enums\IsHomeStatus::Yes();
    @endphp

    @if($isShow->value == business_setting('slider_is_show'))
        <!-- start: Slider Section -->
        @include('front-end.home-page-section.slider')
        <!-- end: Slider Section -->
    @endif

    @if($isShow->value == business_setting('notice_is_show'))
        <!-- Start Notice Section -->
        @include('front-end.home-page-section.notice-section')
        <!-- End Notice Section -->
    @endif

    @if($isShow->value == business_setting('about_is_show'))
        <!-- Start About Section -->
        @include('front-end.home-page-section.about-section')
        <!-- End About Section -->
    @endif

    @if($isShow->value == business_setting('service_is_show'))
        <!-- start: Banner Section -->
        @include('front-end.about-page-section.services')
        <!-- End Services Section -->
    @endif

    @if($isShow->value == business_setting('gallery_is_show'))
        <!-- Project Section -->
        @include('front-end.home-page-section.gallery-section')
        <!-- End Project Section -->
    @endif

    @if($isShow->value == business_setting('client_review_is_show'))
    <!-- Testimonial Section -->
    @include('front-end.home-page-section.testimonial')
    <!-- End Testimonial Section -->
    @endif


    @if($isShow->value == business_setting('blog_is_show'))
        <!-- Blog Section -->
        <div class="blog-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <div class="title">{!! business_setting('blog_section_sub_title') !!}</div>
                    <h2><span>{!! business_setting('blog_section_title') !!} </span></h2>
                </div>
                <div class="inner-container">
                    <div class="clearfix row g-0">
                        <!-- Column -->
                        @foreach ($blogs as $item)
                            <div class="column col-lg-6 col-md-12 col-sm-12">
                                <!-- News Block -->
                                <div class="news-block">
                                    <div class="inner-box">
                                        <div class="clearfix">
                                            <!-- Image Column -->
                                            <div class="image-column col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-column">
                                                    <div class="image">
                                                        <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                                            <img src="{{ asset($item->image) }}" alt="{!! $item->name !!}" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Content Column -->
                                            <div class="content-column col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-column">
                                                    <div class="arrow-one"></div>
                                                    <div class="title">{!! $item->category->name ?? '' !!}</div>
                                                    <h4><a
                                                            href="{{ route('blog.show', [$item->id, $item->slug]) }}">{!! $item->name !!}</a>
                                                    </h4>
                                                    <div class="post-date">{!! $item->created_at->format('M d, Y') !!} by
                                                        <span>Admin</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Section -->
    @endif

    @if($isShow->value == business_setting('google_map_is_show'))
        <!-- Map Section -->
        <div class="map-section">
            <div class="contact-map-area">
                {!! business_setting('hp_google_map_code') !!}
            </div>
        </div>
        <!-- End Map Section -->
    @endif

</x-guest-layout>
