<div class="about-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row align-items-center clearfix">
                <!-- Image Column -->
                <div class="col-lg-5 col-12">
                    @if($isShow->value == business_setting('video_gallery_is_show'))
                        @include('front-end.home-page-section.video-gallery-section')
                    @endif
                    <div class="image-column">
                        <div class="about-image">
                            <div class="about-inner-image">
                                <img src="{{ business_image('ha_left_img') }}" alt="about">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-12 mb-0">
                    <div class="about-column">
                        <div class="sec-title">
                            <div class="title">{!! business_setting('ha_sub_title') !!}</div>
                            <h2><span>{!! business_setting('ha_title') !!}</span> </h2>
                        </div>
                        <div class="text" style="text-align: justify;">
                            {!! business_setting('ha_content') !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
