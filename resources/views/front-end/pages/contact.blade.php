<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :image="business_image('contact_banner') ?? null" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENTG START -->
        <div class="section-full p-tb80">
            <!-- LOCATION BLOCK-->
            <div class="container">

                <!-- GOOGLE MAP & CONTACT FORM -->
                <div class="section-content">
                    <!-- CONTACT FORM-->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="contact-info text-black m-b30">
                                <!-- TITLE START -->
                                <div class="section-head text-left">
                                    <h2 class="m-b5">Contact Info</h2>
                                </div>
                                <!-- TITLE END -->
                                <div class="wt-icon-box-wraper left p-b40">
                                    <div class="icon-xs"><i class="fa fa-phone"></i></div>
                                    <div class="icon-content">
                                        <h5 class="m-t0 font-weight-500">Phone number</h5>
                                        <p>{{ business_setting('phone') }}</p>
                                    </div>
                                </div>

                                <div class="wt-icon-box-wraper left p-b40">
                                    <div class="icon-xs"><i class="fa fa-envelope"></i></div>
                                    <div class="icon-content">
                                        <h5 class="m-t0 font-weight-500">Email address</h5>
                                        <p>{{ business_setting('email') }}</p>
                                    </div>
                                </div>

                                <div class="wt-icon-box-wraper left">
                                    <div class="icon-xs"><i class="fa fa-map-marker"></i></div>
                                    <div class="icon-content">
                                        <h5 class="m-t0 font-weight-500">Address info</h5>
                                        <p>{{ business_setting('address') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <form method="post" action="{{ route('contact-form-message.store') }}">
                                @csrf
                                <div class="contact-one m-b30">

                                    <!-- TITLE START -->
                                    <div class="section-head text-left">
                                        <h2 class="m-b5">Get In Touch</h2>
                                    </div>
                                    <!-- TITLE END -->

                                    <div class="form-group">
                                        <input name="name" type="text" required class="form-control" placeholder="Name">
                                    </div>

                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control" required
                                            placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="message" rows="4" class="form-control " required
                                            placeholder="Message"></textarea>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn-half site-button button-lg m-b15">
                                            <span>Submit</span><em></em>
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if(business_setting('google_map_embed_code'))

                    <div class="gmap-outline">
                        <div class="google-map-gray google-map">
                            {!! business_setting('google_map_embed_code') !!}
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1671883239943!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
