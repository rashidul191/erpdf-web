<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$team->name ?? null" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full py-5">
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
                            {{-- <div>
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
                            </div> --}}

                            <!-- Social Icons -->
                            <div class="my-4">
                                @if($team->fb_link)
                                    <a title="Facebook" target="_blank" href="{{ $team->fb_link }}" class="btn border me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M22 12A10 10 0 1 0 10.44 21.88v-6.28H7.9V12h2.54V9.24c0-2.5 1.49-3.88 3.77-3.88 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 3.6h-2.34v6.28A10 10 0 0 0 22 12z" />
                                        </svg>
                                    </a>
                                @endif

                                @if($team->linkedin_link)
                                    <a title="LinkedIn" target="_blank" href="{{ $team->linkedin_link }}"
                                        class="btn border me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45z" />
                                        </svg>
                                    </a>
                                @endif

                                @if($team->instagram_link)
                                    <a title="Instagram" target="_blank" href="{{ $team->instagram_link }}"
                                        class="btn border">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M7.75 2C4.57 2 2 4.57 2 7.75v8.5C2 19.43 4.57 22 7.75 22h8.5C19.43 22 22 19.43 22 16.25v-8.5C22 4.57 19.43 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5 1.25 1.25 0 0 0 0-2.5zM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>

                            <!-- Description -->
                            <div style="text-align: justify;">
                                {!! $team->description !!}
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
