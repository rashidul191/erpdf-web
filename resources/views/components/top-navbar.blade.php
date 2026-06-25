<div class="header-top">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <!-- Top Left -->
            <div class="top-left">
                <!-- Info List -->
                <ul class="info-list">
                    @if(business_setting('navbar_email'))
                        <li>
                            <a href="mailto:{!! business_setting('navbar_email')  !!}">
                                <span class="icon icofont-envelope"></span>
                                {!! business_setting('navbar_email') !!}</a>
                        </li>
                    @endif
                    @if(business_setting('navbar_phone'))
                        <li>
                            <a href="tel:{!! business_setting('navbar_phone')  !!}">
                                <span class="icon icofont-phone"></span>
                                {!! business_setting('navbar_phone') !!}</a>
                        </li>
                    @endif
                    @if(business_setting('navbar_phone_2'))
                        <li>
                            <a href="tel:{!! business_setting('navbar_phone_2')  !!}">
                                <span class="icon icofont-phone"></span>
                                {!! business_setting('navbar_phone_2') !!}</a>
                        </li>
                    @endif

                    @if(business_setting('office_time'))
                        <li>
                            <a href="#">
                                <span class="icon icofont-clock-time"></span>
                                {!! business_setting('office_time') !!}</a>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Top Right -->
            <div class="top-right pull-right">
                <!-- Social Box -->
                <ul class="social-box">
                    @if(business_setting('twitter_link'))
                        <li>
                            <a target="_blank" href="{{ business_setting('twitter_link') ?? 'javascript:void(0)' }}"
                                class="icofont-twitter"></a>
                        </li>
                    @endif
                    @if(business_setting('fb_link'))
                        <li>
                            <a target="_blank" href="{{ business_setting('fb_link') ?? 'javascript:void(0)' }}"
                                class="icofont-facebook"></a>
                        </li>
                    @endif
                    @if(business_setting('instagram_link'))
                        <li>
                            <a target="_blank" href="{{ business_setting('instagram_link') ?? 'javascript:void(0)' }}"
                                class="icofont-instagram"></a>
                        </li>
                    @endif
                    @if(business_setting('youtube_link'))
                        <li>
                            <a target="_blank" href="{{ business_setting('youtube_link') ?? 'javascript:void(0)' }}"
                                class="icofont-play-alt-1"></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
