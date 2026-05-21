<style>
    .img-box {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        object-fit: cover;
        /* optional - গোল image চাইলে */
    }

    .client-img {
        width: 100%;
        height: 100%;
    }
</style>
<div class="testimonial-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <div class="title">{!! business_setting('testimonial_section_sub_title') !!}</div>
            <h2><span> {!! business_setting('testimonial_section_title') !!} </span></h2>
        </div>
        <div class="testimonial-carousel owl-carousel owl-theme">
            @foreach ($testimonials as $item)
                <!-- Testimonial Block -->
                <div class="testimonial-block text-center">
                    <div class="inner-box">
                        <div class="quote icofont-quote-right"></div>

                        <div class="img-box mb-4">
                            <img src="{{ asset($item->image) }}" alt="" class="client-img">
                        </div>

                        <div>
                            <h4 class="author">{!! $item->name !!}</h4>
                            <p class="mb-1 fw-semibold">{!! $item->designation !!}</p>
                            <div class="text">
                                {!! $item->review_text !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>