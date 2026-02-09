<div class="section-full p-tb90 bg-white overflow-hide">

    <div class="container">
        <div class="section-content">

            <div class="row d-flex align-items-center">

                <div class="col-lg-6 col-md-12 text-black">
                    <!-- TITLE START -->
                    <div class="section-head text-left">
                        <h2 class=" m-b5" data-title="About">About</h2>
                        <div class="wt-separator-outer">
                            <div class="wt-separator site-bg-primary"></div>
                        </div>
                    </div>
                    <!-- TITLE END -->
                    <h4 class=" m-t0">
                        {!! business_setting('about_title') !!}
                    </h4>
                    <p>{!! business_setting('about_description') !!}</p>

                    <div class="row equal-wraper">
                        <div class="col-md-6 m-b30">
                            <div class="wt-icon-box-wraper left bg-gray p-a20 hover-box-effect v-icon-effect  equal-col">
                                <div class="icon-md m-b20">
                                    <span class="icon-cell"><i class="flaticon-room-service v-icon"></i></span>
                                </div>
                                <div class="icon-content">
                                    <h4 class="wt-tilte">Restaurants</h4>
                                    <p>Lorem ipsum dolor sit piscing sed nonmy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 m-b30">
                            <div class="wt-icon-box-wraper left bg-gray p-a20 hover-box-effect v-icon-effect  equal-col">
                                <div class="icon-md m-b20">
                                    <span class="icon-cell"><i class="flaticon-stones v-icon"></i></span>
                                </div>
                                <div class="icon-content">
                                    <h4 class="wt-tilte ">Wellness & Spa</h4>
                                    <p>Lorem ipsum dolor sit piscing sed nonmy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6  m-b30">
                            <div class="wt-icon-box-wraper left bg-gray p-a20 hover-box-effect v-icon-effect  equal-col">
                                <div class="icon-md m-b20">
                                    <span class="icon-cell"><i class="flaticon-wifi v-icon"></i></span>
                                </div>
                                <div class="icon-content">
                                    <h4 class="wt-tilte ">Free Wifi</h4>
                                    <p>Lorem ipsum dolor sit piscing sed nonmy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6  m-b30">
                            <div class="wt-icon-box-wraper left bg-gray p-a20 hover-box-effect v-icon-effect  equal-col">
                                <div class="icon-md m-b20">
                                    <span class="icon-cell"><i class="flaticon-cards v-icon"></i></span>
                                </div>
                                <div class="icon-content">
                                    <h4 class="wt-tilte ">Game Zone</h4>
                                    <p>Lorem ipsum dolor sit piscing sed nonmy</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(request()->routeIs('home.index'))
                    <a href="{{ route('about.index') }}" class="btn-half site-button button-lg m-b30"><span>More About</span><em></em></a>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="home-about-block-outer bg-repeat bg-white" style="background-image:url(images/background/bg-dot.jpg);">
                        <div class="home-about-block-inner">
                            <div class="home-about-slider owl-carousel owl-btn-vertical-center">
                                @foreach ($aboutRightSideImages as $item )
                                <div class="item">
                                    <div class="home-about-slider-pic">
                                        <img src="{{ asset($item->image) }}" alt="">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>