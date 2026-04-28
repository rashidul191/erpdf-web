<div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="goodnews-header"
    data-source="gallery" style="background:#eeeeee;padding:0px;">
    <div id="welcome" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.3.1">
        <ul>

            <!-- SLIDE -->
            @foreach ($sliders as $i => $item)
                <li data-index="rs-90{{ $i + 1 }}" data-transition="fadethroughdark" data-slotamount="default"
                    data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                    data-masterspeed="default" data-thumb="images/main-slider/slider1/slide1.jpg" data-rotate="0"
                    data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off"
                    data-title="Click" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                    data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset($item->image) }}" alt="" data-lazyload="{{ asset($item->image) }}"
                        data-bgposition="center center" data-bgfit="cover" data-bgparallax="4" class="rev-slidebg"
                        data-no-retina>
                    <!-- LAYERS -->
                    <!-- LAYER NR. 0 [ for overlay ] -->
                    <div class="tp-caption tp-shape tp-shapewrapper " id="slide-901-layer-0"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full"
                        data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide"
                        data-responsive_offset="off" data-responsive="off" data-frames='[
                                {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                ]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 1;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                    </div>

                    <!-- LAYER NR. 1 [ Black Box ] -->
                    <div class="tp-caption   tp-resizeme" id="slide-901-layer-1" data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']" data-y="['top','top','top','top']"
                        data-voffset="['250','250','250','250']" data-fontsize="['46','46','46','32']"
                        data-lineheight="['56','56','56','50']" data-width="['0','0','0','0']" data-height="['','','','']"
                        data-whitespace="['normal','normal','normal','normal']" data-type="text" data-responsive_offset="on"
                        data-frames='[
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13;
                                white-space: normal;
                                font-weight: 900;
                                color:#fff;
                                border-width:0px;">
                        <div class=" rev-slider-style-1"></div>
                    </div>



                    <!-- LAYER NR. 2 [ for title ] -->
                    <div class="tp-caption   tp-resizeme" id="slide-901-layer-2" data-x="['left','left','left','left']"
                        data-hoffset="['40','40','40','40']" data-y="['top','top','top','top']"
                        data-voffset="['270','270','270','270']" data-fontsize="['56','56','38','28']"
                        data-lineheight="['66','66','48','38']" data-width="['700','700','96%','96%']"
                        data-height="['none','none','none','none']" data-whitespace="['normal','normal','normal','normal']"
                        data-type="text" data-responsive_offset="on" data-frames='[
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]' data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[20,20,20,20]" style="z-index: 13;
                                white-space: normal;
                                font-weight: 900;
                                color:#fff;
                                border-width:0px;">
                        <div style="font-family: 'DM Serif Text', serif;text-transform:uppercase;">
                            <!-- <span class="site-text-primary"> Discover a</span><br>
                            hotel that defines a new dimension of luxury -->

                            {!! $item->title ?? '' !!}
                        </div>

                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme" id="slide-901-layer-3" data-x="['right','right','right','left']"
                        data-hoffset="['40','40','40','40']" data-y="['top','top','top','top']"
                        data-voffset="['400','570','570','180']" data-fontsize="['400','400','400','80']"
                        data-lineheight="['66','66','48','38']" data-width="['800','800','800','800']"
                        data-height="['none','none','none','none']" data-whitespace="['normal','normal','normal','normal']"
                        data-type="text" data-responsive_offset="on" data-frames='[
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]' data-textAlign="['right','right','right','left']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13;
                                white-space: normal;
                                font-weight: 900;
                                color:rgba(0,0,0,0);">
                        <span class="slider-text-outline"
                            style="font-family: 'Roboto', sans-serif;text-transform:uppercase;">0{{ $i + 1 }}</span>
                    </div>

                    <!-- LAYER NR. 4 [ for see all service botton ] -->
                    <div class="tp-caption tp-resizeme" id="slide-901-layer-4" data-x="['left','left','left','left']"
                        data-hoffset="['40','40','40','40']" data-y="['top','top','top','top']"
                        data-voffset="['570','570','520','460']" data-lineheight="['none','none','none','none']"
                        data-width="['300','300','300','300']" data-height="['none','none','none','none']"
                        data-whitespace="['normal','normal','normal','normal']" data-type="text" data-responsive_offset="on"
                        data-frames='[
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index:13; text-transform:uppercase;">

                        <a href="{{ $item->page_link ? url($item->page_link) : 'javascript:void(0);' }}"
                            class="site-button slider-btn-left btn-half"><span> More
                            </span><em></em></a>
                    </div>
                </li>
            @endforeach

        </ul>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>
</div>
