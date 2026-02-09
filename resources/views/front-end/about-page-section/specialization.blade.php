 <div class="section-full bg-change-section overlay-wraper p-tb90" data-toggle="tab-hover">
            <div class="overlay-main bg-black opacity-06"></div>
            <div class="bg-changer">
                <div class="section-bg active" style="background-image:url('{{ business_image('spe_room_img') }}')"></div>
                <div class="section-bg" style="background-image:url('{{ business_image('spe_restaurant_img') }}')"></div>
                <div class="section-bg" style="background-image:url('{{ business_image('spe_luxury_img') }}')"></div>
                <div class="section-bg" style="background-image:url('{{ business_image('spe_meeting_hall_img') }}')"></div>
            </div>

            <div class="container">
                <!-- TITLE START -->
                <div class="section-head text-left">
                    <h2 class="m-b5 text-white" data-title="Specialization">Our Specialization</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator site-bg-primary"></div>
                    </div>
                </div>
                <!-- TITLE END -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="services-part-left ">
                            <div class="text-white">
                                <h3 class=" m-t0">{!! business_setting('spe_title') !!}</h3>
                                <p>{!! business_setting('spe_description') !!}</p>
                            </div>
                            <div class="section-content">
                                <div class="row">

                                    <div class="col-md-4 col-sm-4 col-xs-4 col-xs-100pc">
                                        <div class="m-b30 wt-icon-box-wraper">
                                            <h2 class="site-text-primary m-b5 font-weight-800 counter-box"><span class="counter m-r5" data-number="{{ business_setting('spe_count_number_1') ?? '0' }}">0</span><b>+</b></h2>
                                            <h5 class="wt-tilte m-b0 text-white">{{ business_setting('spe_count_title_1') ?? '' }}</h5>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-4 col-xs-100pc">
                                        <div class="m-b30  wt-icon-box-wraper">
                                            <h2 class="site-text-primary m-b5 font-weight-800 counter-box"><span class="counter m-r5" data-number="{{ business_setting('spe_count_number_2') ?? '0' }}">0</span><b>+</b></h2>
                                            <h5 class="wt-tilte m-b0 text-white">{{ business_setting('spe_count_title_2') ?? '' }}</h5>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-4 col-xs-100pc">
                                        <div class="m-b30 wt-icon-box-wraper">
                                            <h2 class="site-text-primary m-b5 font-weight-800 counter-box"><span class="counter m-r5" data-number="{{ business_setting('spe_count_number_3') ?? '0' }}">0</span><b>+</b></h2>
                                            <h5 class="wt-tilte m-b0 text-white">{{ business_setting('spe_count_title_3') ?? '' }}</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row no-col-gap twm-our-speci-box-wrap">
                            <div class="col-md-6 col-sm-6 col-xs-6 col-xs-100pc">
                                <div class="wt-icon-box-wraper p-tb20 center bdr-1 bdr-solid bdr-white  bgcall-block hover-box-effect">
                                    <div class="icon-md site-text-primary">
                                        <span class="icon-cell text-white"><i class="flaticon-hotel"></i></span>
                                    </div>
                                    <div class="icon-content text-white">
                                        <h4 class="wt-tilte m-b10">Rooms</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 col-xs-100pc">
                                <div class="wt-icon-box-wraper p-tb20 center bdr-1 bdr-solid bdr-white  bgcall-block  hover-box-effect">
                                    <div class="icon-md site-text-primary">
                                        <span class="icon-cell text-white"><i class="flaticon-coffee-cup"></i></span>
                                    </div>
                                    <div class="icon-content  text-white">
                                        <h4 class="wt-tilte m-b10">Restaurant</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 col-xs-100pc">
                                <div class="wt-icon-box-wraper p-tb20 center bdr-1 bdr-solid bdr-white  bgcall-block  hover-box-effect">
                                    <div class="icon-md site-text-primary">
                                        <span class="icon-cell text-white"><i class="flaticon-cheers"></i></span>
                                    </div>
                                    <div class="icon-content  text-white">
                                        <h4 class="wt-tilte m-b10">Luxury Bars</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6  col-sm-6 col-xs-6 col-xs-100pc">
                                <div class="wt-icon-box-wraper p-tb20 center bdr-1 bdr-solid bdr-white bgcall-block hover-box-effect">
                                    <div class="icon-md site-text-primary">
                                        <span class="icon-cell text-white"><i class="flaticon-seats-at-the-hall"></i></span>
                                    </div>
                                    <div class="icon-content  text-white">
                                        <h4 class="wt-tilte m-b10">Meeting Hall</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>