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