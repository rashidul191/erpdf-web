<x-guest-layout>

    <!-- INNER PAGE BANNER -->
    <x-page-banner :image="business_image('contact_banner') ?? null" />
    <!-- INNER PAGE BANNER END -->

    <!-- Map Section -->
    <div class="map-section">
        <div class="contact-map-area">
            {!! business_setting('google_map_code') !!}
        </div>
    </div>
    <!-- End Map Section -->

    <!-- Contact Page Section -->
    <div class="contact-page-section">
        <div class="auto-container">
            <!-- Contact Info Boxed -->
            <div class="contact-info-boxed">
                <div class="row clearfix">

                    <!-- Column -->
                    <div class="column col-lg-6 col-md-6 col-sm-12">
                        <!-- <h2>Brooklyn, <span>New York</span></h2> -->
                        <div class="text mb-4"><strong>Address:</strong> {!! business_setting('address') !!}</div>
                        <div class="email">Email: <a
                                href="mailto:{!! business_setting('email') !!}">{!! business_setting('email') !!}</a>
                        </div>
                    </div>

                    <!-- Column -->
                    <div class="column col-lg-6 col-md-6 col-sm-12">
                        <div class="email mb-4">Call directly:
                            <a href="tel:{!! business_setting('phone') !!}">{!! business_setting('phone') !!}</a>
                        </div>
                        <div>
                            <ul class="location-list">
                                <li><span>Work Hours:</span>{{ business_setting('office_time') }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Form Boxed -->
            <div class="form-boxed">
                <div class="sec-title centered">
                    <h2>{!! business_setting('contact_title') ?? '' !!}</h2>
                </div>

                <div class="boxed-inner">
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <!-- Contact Form -->
                        <form method="POST" action="{{ route('contact-form-message.store') }}" id="contact-form">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="Name *" required>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Emaill Address *" required>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject (Optional)" required>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                            class="txt">Send Message</span></button>
                                </div>

                            </div>
                        </form>
                        <p class="form-messege"></p>

                    </div>
                    <!--End Contact Form -->
                </div>

            </div>

        </div>
    </div>
    <!-- End Blog Detail Section -->


</x-guest-layout>
