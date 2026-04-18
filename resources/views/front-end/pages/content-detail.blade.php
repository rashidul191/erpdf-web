<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        {{-- <x-page-banner :image="business_image('contact_banner') ?? null" /> --}}
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">

                        <!-- BLOG START -->
                        <div class="card shadow-sm border-0">
                            <!-- Image -->
                            <div class="overflow-hidden">
                                <img src="{{ asset($content->image) }}" alt="{{ $content->title }}"
                                    class="card-img-top img-fluid" style="height: 400px; object-fit: cover;">
                            </div>

                            <div class="card-body p-5">

                                <!-- Title -->
                                <h3 class="card-title mb-3 fw-bold">
                                    {{ $content->title }}
                                </h3>

                                <!-- Short Description -->
                                @if($content->short_description)
                                    <div class="mb-3 text-secondary" style="text-align: justify;">
                                        {!! $content->short_description !!}
                                    </div>
                                @endif

                                <!-- Full Description -->
                                @if($content->description)
                                    <div class="text-dark" style="text-align: justify; line-height: 1.8;">
                                        {!! $content->description !!}
                                    </div>
                                @endif

                            </div>
                        </div>
                        <!-- BLOG END -->

                    </div>
                </div>
            </div>
        </div>
        <!-- SECTION CONTENT END -->

        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
