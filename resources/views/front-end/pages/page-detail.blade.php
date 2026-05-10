<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">
        <!-- INNER PAGE BANNER -->
        <x-page-banner :image="getRawImage($content, 'page_banner_image', true) ?? null" />

        <!-- INNER PAGE BANNER END -->
        @if($content != null)
                <!-- SECTION CONTENT START -->
                <div class="section-full py-5 bg-light">
                    <div class="container">
                        <!-- Content START -->
                        <div class="card shadow-sm border-0">
                            <div class="row">
                                <!-- Title -->
                                {{-- <div
                                    class="col-12 {{ $content->page_layout_type->value == \App\Enums\PageLayoutType::OneColumn ? 'col-md-12' : 'col-md-6' }}">
                                    <h3 class="card-title mb-3 fw-bold p-5">
                                        {{ $content->title }}
                                    </h3>
                                </div> --}}

                                @if($content->getRawOriginal('image')) <!-- Image -->
                                    <div
                                        class="col-12 {{ $content->page_layout_type->value == \App\Enums\PageLayoutType::OneColumn ? 'col-md-12' : 'col-md-4' }} overflow-hidden">
                                        <img src="{{ asset($content->image) }}" alt="{{ $content->title }}"
                                            class="card-img-top img-fluid" style="height: 400px; object-fit: cover;">
                                    </div>
                                @endif

                                <div class="col-12 {{ $content->page_layout_type->value == \App\Enums\PageLayoutType::OneColumn ? 'col-md-12' : 'col-md-8' }} p-5">

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
                                    <!-- Others -->
                                    @if($content->others)
                                        <div class="text-dark" style="text-align: justify; line-height: 1.8;">
                                            {!! $content->others !!}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- Content END -->
                    </div>
                </div>
            </div>
            <!-- SECTION CONTENT END -->
        @else
        <div class="section-full py-5 my-5 text-center">
            <h3 class="text-danger">Content Not Aviable!</h3>
        </div>
    @endif

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
