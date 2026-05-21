<!-- CONTENT START -->
@if($videoGalleries->isNotEmpty())
    <div class="py-5">
        <div class="container">

            @if(request()->routeIs('home.index'))
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="title"> {!! business_setting('video_gallery_section_sub_title') !!}</div>
                    <h2><span>{!! business_setting('video_gallery_section_title') !!} </span></h2>
                </div>
            @endif

            <div class="video-gallery">
                @foreach ($videoGalleries as $item)
                    <div class="wt-post-thum border ">
                        {{ $item->youtube_video_link }}
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@else
    @if (!request()->routeIs('home.index'))
        <x-no-data-found></x-no-data-found>
    @endif
@endif
<!-- CONTENT END -->
