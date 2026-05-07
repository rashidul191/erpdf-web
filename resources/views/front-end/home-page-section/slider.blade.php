<div class="banner-section">
    <div class="main-slider-carousel owl-carousel owl-theme">
        @foreach ($sliders as $item)
        <div class="slide" data-bg-image="{{asset($item->image)}}">
            <div class="auto-container w-100">
                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="title">{!! $item->sub_title ?? '' !!}</div>
                            <h1>{!! $item->title ?? '' !!}</h1>
                            <div class="text">{!! $item->short_description ?? '' !!}</div>
                            <div class="btn-box">
                                <a href="{{ $item->link ?? 'javascript:void(0)' }}" class="theme-btn btn-style-one"><span class="txt">{!! $item->btn_text ?? '' !!}</span></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
