<div class="section-full bg-gray p-tb90 ">
    <div class="container">
        <!-- TITLE START -->
        <div class="section-head text-center">
            <h2 class="m-b5">Our Story</h2>
            <div class="wt-separator-outer">
                <div class="wt-separator site-bg-primary"></div>
            </div>
        </div>
        <!-- TITLE END -->
        <div class="section-content our-story">

            @foreach ($ourStories as $item)
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="our-story-pic-block">
                            <div class="notification-animate">
                                <div class="wt-media our-story-pic wt-img-effect zoom-slow">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="wt-box our-story-detail">
                            <h4>{{ $item->date ?? '' }}</h4>
                            <h3 class=" m-b10">{!! $item->title !!}</h3>
                            <div class="dec">{!! $item->description ?? '' !!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
