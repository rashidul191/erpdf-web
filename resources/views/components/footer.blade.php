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
                                    <input name="news-letter" class="form-control" placeholder="ENTER YOUR EMAIL" type="text">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn-half site-button button-lg"><span>Submit</span><em></em></button>
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

                        <ul class="social-icons social-tooltips-outer wt-social-links mt-5">
                            <li><a target="_blank" href="{{ business_setting('fb_link') }}" class="fa fa-facebook"><span class="social-tooltips">Facebook</span></a></li>
                            <li><a target="_blank" href="{{ business_setting('twitter_link') }}" class="fa fa-twitter"><span class="social-tooltips">Twitter</span></a></li>
                            <li><a target="_blank" href="{{ business_setting('instagram_link') }}" class="fa fa-instagram"><span class="social-tooltips">Instagram</span></a></li>
                            <li><a target="_blank" href="{{ business_setting('youtube_link') }}" class="fa fa-youtube"><span class="social-tooltips">Youtube</span></a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_services inline-links">
                        <h4 class="widget-title">Useful links</h4>
                        <ul>
                            <li><a href="{{ route('about.index') }}">About</a></li>
                            <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                            <li><a href="{{ route('blog.index') }}">Blog</a></li>
                            <!-- <li><a href="work-masonry.html">Portfolio</a></li> -->
                            <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                            <!-- <li><a href="contact-1.html">FAQ </a></li> -->
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_services inline-links">
                        <h4 class="widget-title">Rooms & Suites</h4>
                        <ul>
                            <li><a href="project-detail.html">Classic</a></li>
                            <li><a href="project-detail.html">Superior</a></li>
                            <li><a href="project-detail.html">Delux</a></li>
                            <li><a href="project-detail.html">Master</a></li>
                            <!-- <li><a href="project-detail.html">luxury</a></li>
                            <li><a href="project-detail.html">Banquet Halls</a></li> -->
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_address_outer">
                        <h4 class="widget-title">Contact Us</h4>
                        <ul class="widget_address">
                            <li><i class="sl-icon-map site-text-primary"></i> {!! business_setting('address') !!}</li>
                            <li><i class="sl-icon-envolope-letter site-text-primary"></i>{!! business_setting('email') !!}</li>
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
                    <span class="copyrights-text">&copy; 2020 - {{ date('Y') }} {!! business_setting('copyright') ?? business_setting('website_name') !!}. Developed By <a style="color: #c19b76;" href="https://sawebsoft.com/" target="_blank">SA WebSoft</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
