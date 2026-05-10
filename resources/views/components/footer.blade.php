<footer class="main-footer border-top">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget logo-widget">
                        <div class="logo">
                            <a href="{{ route('home.index') }}">
                                <img src="{{ business_image('footer_logo') }}" alt="" />
                            </a>
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
                @php
                    $menuManages = \App\Models\MenuManage::oldest('serial')->get();
                @endphp

                @forelse ($menuManages as $index => $item)
                    <div
                        class=" {{ $menuManages->count() == 1 ? 'col-lg-6' : ($menuManages->count() == 2 ? 'col-lg-4' : 'col-lg-3') }} col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
                            <h5 class="widget-title">{{ $item->name }}</h5>
                            <ul>
                                @foreach ($item->menus as $menu)
                                    <li><a href="{{ route('page.index', $menu->page->slug) }}">{{ $menu->page->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @empty

                @endforelse

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
