<footer class="site-footer footer-large footer-dark	footer-wide">

    <!-- FOOTER BLOCKES START -->
    <div class="footer-top overlay-wraper">
        <div class="overlay-main"></div>
        <div class="container">

            <div class="news-letter-footer">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="newsletter-f-left">
                            <h4 class="text-uppercase m-t0 m-b10">Subscribe to our newsletter!</h4>
                            <p>Never Miss Anything From Construx By Signing Up To Our Newsletter. </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="newsletter-f-right text-center">
                            <form role="search" method="post">
                                <div class="input-group">
                                    <input name="news-letter" class="form-control" placeholder="ENTER YOUR EMAIL"
                                        type="text">
                                    <span class="input-group-btn">
                                        <button type="submit"
                                            class="btn-half site-button button-lg"><span>Submit</span><em></em></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-b10">
                <div class="wt-divider bg-gray-dark"></div>
            </div>
            <div class="row">
                <!-- ABOUT COMPANY -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_about">
                        <div class="logo-footer clearfix p-b15">
                            <a href="{{ route('home.index') }}">
                                <img src="{{ business_image('logo') }}" alt="{{ business_setting('website_name') }}">
                            </a>
                        </div>
                        <!-- <p class="max-w400">Today we can tell you, thanks to your passion, hard work creativity, and expertise, you delivered us the most beautiful house great looks.</p> -->

                        <ul class="social-icons social-tooltips-outer wt-social-links mt-4">
                            <li><a target="_blank" href="{{ business_setting('fb_link') ?? '#' }}"
                                    class="fa fa-facebook"><span class="social-tooltips">Facebook</span></a></li>
                            <li><a target="_blank" href="{{ business_setting('twitter_link') ?? '#' }}"
                                    class="fa fa-twitter"><span class="social-tooltips">Twitter</span></a></li>
                            <li><a target="_blank" href="{{ business_setting('instagram_link') ?? '#' }}"
                                    class="fa fa-instagram"><span class="social-tooltips">Instagram</span></a></li>
                            <li><a target="_blank" href="{{ business_setting('youtube_link') ?? '#' }}"
                                    class="fa fa-youtube"><span class="social-tooltips">Youtube</span></a></li>
                        </ul>
                    </div>
                </div>

                @php
                    $menuManages = \App\Models\MenuManage::oldest('serial')->get();
                    // dd($menuManage);
                @endphp

                @forelse ($menuManages as $index => $item)
                    <div
                        class=" {{ $menuManages->count() == 1 ? 'col-lg-6' : ($menuManages->count() == 2 ? 'col-lg-3' : 'col-lg-2') }} col-md-6 col-sm-6">
                        <div class="widget widget_services inline-links">
                            <h4 class="widget-title">{{ $item->name }}</h4>
                            <ul>
                                @foreach ($item->menus as $menu)
                                    <li><a href="{{ route('page.index', $menu->page->slug) }}">{{ $menu->page->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @empty

                @endforelse

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_address_outer">
                        <h4 class="widget-title">Contact</h4>
                        <ul class="widget_address">
                            <li><i class="sl-icon-map site-text-primary"></i> {!! business_setting('address') !!}</li>
                            <li><i
                                    class="sl-icon-envolope-letter site-text-primary"></i>{!! business_setting('email') !!}
                            </li>
                            <li><i class="sl-icon-phone site-text-primary"></i>{!! business_setting('phone') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER COPYRIGHT -->
    <div class="footer-bottom overlay-wraper">
        <div class="overlay-main"></div>
        <div class="container">
            <div class="row">
                <div class="wt-footer-bot-center">
                    <span class="copyrights-text">&copy; 2020 - {{ date('Y') }}
                        {!! business_setting('copyright') ?? business_setting('website_name') !!}. Developed By <a
                            style="color: #c19b76;" href="https://sawebsoft.com/" target="_blank">SA WebSoft</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>



<footer class="main-footer">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget logo-widget">
                        <div class="logo">
                            <a href="{{ route('home.index') }}"><img src="{{ business_image('footer_logo') }}"
                                    alt="" /></a>
                        </div>
                        <div class="call">
                            <li>
                                <a class="footer_phone" href="tel:{!! business_setting('footer_phone') !!}">
                                    <span class="icon icofont-envelope"></span>
                                    {!! business_setting('footer_phone') !!}</a>
                            </li>
                            <li>
                                <a class="footer_email" href="mailto:{!! business_setting('footer_email') !!}">
                                    <span class="icon icofont-phone"></span>
                                    {!! business_setting('footer_email') !!}</a>
                            </li>
                            <li>
                                <a class="address" href="javascript:void(0)">
                                    <span class="icon icofont-google-map"></span>
                                    {!! business_setting('footer_address') !!}</a>
                            </li>
                        </div>
                    </div>
                </div>


                <!-- Footer Column -->
                <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <h5>Company</h5>
                        <ul class="list-link">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Team Members</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="bottom-inner">
                    <div class="row clearfix">

                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="copyright">Copyright &copy; {{ date('Y') }}
                                {{business_setting('copyright_text') ?? business_setting('website_name') }} All rights
                                reserved | Developed <i class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                    href="https://sawebsoft.com/" target="_blank">SA WebSoft</a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <ul class="social-nav">
                                <li><a target="_blank"
                                        href="{{ business_setting('twitter_link') ?? 'javascript:void(0)' }}"
                                        class="icofont-twitter"></a></li>
                                <li><a target="_blank" href="{{ business_setting('fb_link') ?? 'javascript:void(0)' }}"
                                        class="icofont-facebook"></a></li>
                                <li><a target="_blank"
                                        href="{{ business_setting('instagram_link') ?? 'javascript:void(0)' }}"
                                        class="icofont-instagram"></a></li>
                                <li><a target="_blank"
                                        href="{{ business_setting('youtube_link') ?? 'javascript:void(0)' }}"
                                        class="icofont-play-alt-1"></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
