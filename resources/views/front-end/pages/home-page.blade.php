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

    @if($isShow->value == business_setting('service_is_show'))
        <!-- start: Banner Section -->
        @include('front-end.about-page-section.services-section')
        <!-- End Services Section -->
    @endif


    @if($isShow->value == business_setting('activity_is_show'))
        <!-- Blog Section -->
        @include('front-end.home-page-section.activity')
        <!-- End Blog Section -->
    @endif

    @if($isShow->value == business_setting('blog_is_show'))
        <!-- Blog Section -->
        @include('front-end.home-page-section.blog-section')
        <!-- End Blog Section -->
    @endif

    <div>
        @if($isShow->value == business_setting('gallery_is_show'))
            <!-- Project Section -->
            @include('front-end.home-page-section.gallery-section')
            <!-- End Project Section -->
        @endif
        @if($isShow->value == business_setting('video_gallery_is_show'))
            <!-- Project Section -->
            @include('front-end.home-page-section.video-gallery-section')
            <!-- End Project Section -->
        @endif
    </div>


    @if($isShow->value == business_setting('about_is_show'))
        <!-- Start About Section -->
        @include('front-end.home-page-section.about-section')
        <!-- End About Section -->
    @endif

    @if($isShow->value == business_setting('testimonial_is_show'))
        <!-- Testimonial Section -->
        @include('front-end.home-page-section.testimonial-section')
        <!-- End Testimonial Section -->
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
