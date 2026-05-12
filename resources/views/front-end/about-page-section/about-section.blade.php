<div class="about-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row align-items-center clearfix">
                <!-- Image Column -->
                <div class="image-column col-lg-6">
                    <div class="about-image">
                        <div class="about-inner-image">
                            <img src="{{ business_image('about_page_left_img') }}" alt="about">
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12 mb-0">
                    <div class="about-column">
                        <div class="sec-title">
                            <div class="title">{!! business_setting('about_page_sub_title') !!}</div>
                            <h2><span>{!! business_setting('about_page_title') !!}</span> </h2>
                        </div>
                        <div class="text" style="text-align: justify;">
                            {!! business_setting('about_page_content') !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
