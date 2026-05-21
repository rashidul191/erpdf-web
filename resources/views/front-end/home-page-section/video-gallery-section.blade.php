<style>
    .video-slider-wrapper {
        position: relative;
        overflow: hidden;
    }

    .video-slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .video-slide {
        min-width: 100%;
        padding: 10px;
    }

    .video-card {
        overflow: hidden;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
    }

    .video-card iframe {
        width: 100%;
        height: 350px;
        border: 0;
        display: block;
    }

    /* buttons */
    .video-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        border: none;
        border-radius: 50%;
        background: rgba(2, 78, 153, 0.9);
        color: #fff;
        font-size: 22px;
        cursor: pointer;
        z-index: 10;
        transition: 0.3s;
    }

    .video-btn:hover {
        background: #01366b;
    }

    .video-prev {
        left: 10px;
    }

    .video-next {
        right: 10px;
    }

    /* dots */
.video-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.video-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #cbd5e1;
    cursor: pointer;
    transition: 0.3s;
}

.video-dot.active {
    width: 30px;
    border-radius: 20px;
    background: #024e99;
}

    @media(max-width: 768px) {

        .video-card iframe {
            height: 240px;
        }

        .video-btn {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
    }
</style>

<!-- CONTENT START -->
@if($videoGalleries->isNotEmpty())

    <div class="py-5">
        <div class="{{ request()->routeIs('home.index') ? '' : 'container' }}">

            @if(request()->routeIs('home.index'))
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="title">
                        {!! business_setting('video_gallery_section_sub_title') !!}
                    </div>

                    <h2>
                        <span>
                            {!! business_setting('video_gallery_section_title') !!}
                        </span>
                    </h2>
                </div>
            @endif

            <!-- VIDEO SLIDER -->
            <div class="video-slider-wrapper">

                <!-- buttons -->
                <button class="video-btn video-prev">&#10094;</button>
                <button class="video-btn video-next">&#10095;</button>

                <div class="video-slider">

                    @foreach ($videoGalleries as $item)

                        <div class="video-slide">

                            <div class="video-card">

                               @php
    parse_str(parse_url($item->youtube_video_link, PHP_URL_QUERY), $vars);
    $videoId = $vars['v'] ?? '';
@endphp

<iframe
    src="https://www.youtube.com/embed/{{ $videoId }}"
    allowfullscreen>
</iframe>

                            </div>

                        </div>

                    @endforeach

                </div>

                <!-- dots -->
<div class="video-dots">
    @foreach ($videoGalleries as $index => $item)
        <span class="video-dot {{ $index == 0 ? 'active' : '' }}"
              data-slide="{{ $index }}">
        </span>
    @endforeach
</div>

            </div>

        </div>
    </div>

@else

    @if (!request()->routeIs('home.index'))
        <x-no-data-found></x-no-data-found>
    @endif

@endif
<!-- CONTENT END -->

<script>
document.addEventListener("DOMContentLoaded", function () {

    const slider = document.querySelector(".video-slider");
    const slides = document.querySelectorAll(".video-slide");
    const nextBtn = document.querySelector(".video-next");
    const prevBtn = document.querySelector(".video-prev");
    const dots = document.querySelectorAll(".video-dot");

    let currentIndex = 0;

    function updateSlider() {

        slider.style.transform =
            `translateX(-${currentIndex * 100}%)`;

        // active dot
        dots.forEach(dot => dot.classList.remove("active"));

        dots[currentIndex].classList.add("active");
    }

    // next
    nextBtn.addEventListener("click", function () {

        currentIndex++;

        if (currentIndex >= slides.length) {
            currentIndex = 0;
        }

        updateSlider();
    });

    // prev
    prevBtn.addEventListener("click", function () {

        currentIndex--;

        if (currentIndex < 0) {
            currentIndex = slides.length - 1;
        }

        updateSlider();
    });

    // dots click
    dots.forEach(dot => {

        dot.addEventListener("click", function () {

            currentIndex = parseInt(this.dataset.slide);

            updateSlider();
        });

    });

});
</script>
