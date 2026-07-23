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

    @if($isShow->value == business_setting('gallery_is_show'))
        <div class="container">
            <!-- Project Section -->
            @include('front-end.home-page-section.gallery-section')
            <!-- End Project Section -->
        </div>
    @endif

    @if($isShow->value == business_setting('video_gallery_is_show'))
        <div class="container py-5">
            <div class="sec-title">
                <div class="title">
                    {!! business_setting('video_gallery_section_sub_title') !!}
                </div>
                <h2>
                    <span>
                        {!! business_setting('video_gallery_section_title') !!}
                    </span>
                </h2>
            </div>
            <div class="row">
                 @foreach ($videoGalleries as $item)
                <div class="col-12 col-md-6 col-lg-4">
  <div>

                               @php
    parse_str(parse_url($item->youtube_video_link, PHP_URL_QUERY), $vars);
    $videoId = $vars['v'] ?? '';
@endphp

<iframe
    src="https://www.youtube.com/embed/{{ $videoId }}" width="100%" height="230px"
    allowfullscreen>
</iframe>

                            </div>
                </div>
                @endforeach
            </div>
        </div>
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
