<x-guest-layout>

    <style>
        .accordion-button {
            background-color: #f8fafc;
            transition: 0.3s;
        }

        .accordion-button:not(.collapsed) {
            background-color: #c19b76;
            color: #fff;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-item {
            border-radius: 12px;
        }

        .accordion-body {
            line-height: 1.7;
        }
    </style>
    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :image="business_image('faq_page_banner_img') ?? null" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENTG START -->
        <div class="section-full p-tb80">
            <div class="container">
                <!-- LOCATION BLOCK-->
                <div class="accordion" id="faqAccordion">
                    @forelse ($faqs as $item)
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">

                            <h2 class="accordion-header" id="heading{{ $item->id }}">
                                <button class="accordion-button fw-semibold {{ !$loop->first ? 'collapsed' : '' }}"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $item->id }}">
                                    {{ $item->question }}
                                </button>
                            </h2>

                            <div id="collapse{{ $item->id }}"
                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                aria-labelledby="heading{{ $item->id }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted" style="text-align: justify;">
                                    {!! $item->answer !!}
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="my-5 py-5">
                            <h3 class="text-center text-danger">Data Not Found!</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
