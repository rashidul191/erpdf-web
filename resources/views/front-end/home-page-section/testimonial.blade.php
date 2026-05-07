<div class="testimonial-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <div class="title">{!! business_setting('cr_sub_title') !!}</div>
            <h2><span> {!! business_setting('cr_title') !!} </span></h2>
        </div>
        <div class="testimonial-carousel owl-carousel owl-theme">
            @foreach ($clientReviews as $item)
            <!-- Testimonial Block -->
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="quote icofont-quote-right"></div>
                    <div class="author">{!! $item->name !!} <span>/ {!! $item->designation !!}</span></div>
                    <div class="text">
                        {!! $item->review_text !!}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>