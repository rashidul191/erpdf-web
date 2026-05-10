<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$team->name ?? null" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-tb90">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-5 col-lg-5">
                        <div class="wt-post-media clearfix m-b30">
                            <div class="portfolio-item wt-img-effect">
                                <img class="img-responsive" src="{{ asset($team->image) }}" alt="{!! $team->name !!}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-7">
                        <div>
                            <!-- Name & Designation -->
                            <div class="mb-3">
                                <h2 class="fw-bold mb-1">{!! $team->name !!}</h2>
                                <p class="text-muted mb-0">
                                    <strong>Designation:</strong> {!! $team->designation !!}
                                </p>
                            </div>
                            <hr>
                            <!-- Contact Info -->
                            <div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-phone me-2"></i>
                                    <span>{!! $team->phone !!}</span>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <i class="fa-brands fa-whatsapp me-2"></i>
                                    <span>{!! $team->whatsapp !!}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-envelope me-2"></i>
                                    <span>{!! $team->email !!}</span>
                                </div>
                            </div>

                            <!-- Social Icons -->
                            <div class="mt-4">
                                @if($team->fb_link)
                                    <a target="_blank" href="{{ $team->fb_link ?? '#' }}" class="btn border me-2">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if($team->twitter_link)
                                    <a target="_blank" href="{{ $team->twitter_link ?? '#' }}" class="btn border me-2">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                @endif
                                @if($team->instagram_link)
                                    <a target="_blank" href="{{ $team->instagram_link ?? '#' }}" class="btn border">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>




                </div>

                <!-- Description -->
                <div style="text-align: justify;">
                    {!! $team->short_description !!}
                </div>
            </div>
        </div>
        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
