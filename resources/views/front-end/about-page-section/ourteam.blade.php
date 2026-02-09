<div class="section-full p-t90 p-b60 bg-white">
    <div class="container">

        <!-- TITLE START -->
        <div class="section-head text-left">
            <h2 class="  m-b5" data-title="Team">Our Team</h2>
            <div class="wt-separator-outer">
                <div class="wt-separator site-bg-primary"></div>
            </div>
        </div>
        <!-- TITLE END -->

        <!-- IMAGE CAROUSEL START -->
        <div class="our-team-two">
            <div class="row d-flex justify-content-center">
                @foreach ( $teams as $item )

                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="wt-team-arc2">

                        <div class="wt-media">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                            <div class="team-social-center">
                                <ul class="team-social-icon">
                                    <li><a href="{{ $item->fb_link ?? 'javascript:void(0)' }}" class="fa fa-facebook"></a></li>
                                    <li><a href="{{ $item->twitter_link ?? 'javascript:void(0)' }}" class="fa fa-twitter"></a></li>
                                    <li><a href="{{ $item->instagram_link ?? 'javascript:void(0)' }}" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="wt-info">
                            <div class="team-detail  text-center">
                                <h4 class="m-t0">{{ $item->name }}</h4>
                                <p>{{ $item->designation }}</p>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>