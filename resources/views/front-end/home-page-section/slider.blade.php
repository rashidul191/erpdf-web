<div class="banner-section">
    <div class="main-slider-carousel owl-carousel owl-theme">
        @foreach ($sliders as $item)
            <div class="slide" data-bg-image="{{asset($item->image)}}">
                <div class="auto-container w-100">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-7 col-md-12 col-sm-12">
                            <div class="inner-column">
                                {{-- <div class="title">{!! $item->sub_title ?? '' !!}</div> --}}
                                <h1 class="text-white fw-semibold">{!! $item->title ?? '' !!}</h1>
                                {{-- <div class="text">{!! $item->short_description ?? '' !!}</div> --}}
                                @if($item->page_link)
                                    <div class="btn-box mt-3">
                                        <a href="{{ $item->page_link ?? 'javascript:void(0)' }}"
                                            class="theme-btn btn-style-one">
                                            <span class="txt">{!! $item->btn_text ?? 'Learn More' !!}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
