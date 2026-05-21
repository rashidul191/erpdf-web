<style>
    .custom-gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        list-style: none;
        padding: 0;
    }

    .custom-gallery li {
        width: calc(25% - 15px);
    }

    /* 👉 সব image same size */
    .gallery_img_box {
        width: 100%;
        height:
            {{ request()->routeIs('home.index') ? '150px' : '250px' }}
        ;
        overflow: hidden;
        position: relative;
    }

    /* zoom icon overlay */
    .gallery_img_box::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.8);
        width: 55px;
        height: 55px;
        background: rgba(2, 78, 153, 0.75);
        border-radius: 50%;
        opacity: 0;
        transition: 0.3s;
        pointer-events: none;

        /* SVG icon */
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'%3E%3Cpath d='M10 2a8 8 0 105.293 14.293l4.707 4.707 1.414-1.414-4.707-4.707A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 22px;
    }

    .gallery_img_box:hover::before {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    /* image */
    .gallery-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
        transition: 0.3s;
    }

    .gallery-img:hover {
        transform: scale(1.05);
    }

    /* Lightbox */
    #lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.80);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    /* 👉 বড় image */
    #lightbox img {
        max-width: 85%;
        max-height: 85%;
        border-radius: 5px;
    }

    /* Close */
    .close-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 35px;
        color: #fff;
        cursor: pointer;
    }

    /* 👉 Arrow buttons */
    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 40px;
        color: #fff;
        cursor: pointer;
        padding: 10px;
        user-select: none;
    }

    .prev-btn {
        left: 20px;
    }

    .next-btn {
        right: 20px;
    }

    /* Tablet (2 column) */
    @media (max-width: 991px) {
        .custom-gallery li {
            width: calc(50% - 15px);
        }
    }

    /* Mobile (1 column) */
    @media (max-width: 575px) {
        .custom-gallery li {
            width: 100%;
        }

        /* একটু height কমাও mobile এ */
        .gallery_img_box {
            height: 200px;
        }
    }
</style>

<!-- CONTENT START -->
@if($galleryImages->isNotEmpty())
    <div class="py-5">
        <div class="{{ request()->routeIs('home.index') ? '' : 'container' }}">

            @if(request()->routeIs('home.index'))
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="title"> {!! business_setting('gallery_section_sub_title') !!}</div>
                    <h2><span> {!! business_setting('gallery_section_title') !!} </span></h2>
                </div>
            @endif

            <ul class="custom-gallery">
                @foreach ($galleryImages as $item)
                    <li>
                        <div class="wt-post-thum border gallery_img_box">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}" class="gallery-img">
                        </div>
                    </li>
                @endforeach
            </ul>

            <!-- Lightbox -->
            <div id="lightbox">
                <span class="close-btn">&times;</span>
                <!-- arrows -->
                <span class="nav-btn prev-btn">&#10094;</span>
                <span class="nav-btn next-btn">&#10095;</span>
                <img id="lightbox-img">
            </div>

            @if (!request()->routeIs('home.index'))
                <!-- ✅ Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $galleryImages->links('pagination::bootstrap-4') }}
                </div>
            @endif
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

        const images = document.querySelectorAll(".gallery-img");
        const lightbox = document.getElementById("lightbox");
        const lightboxImg = document.getElementById("lightbox-img");
        const closeBtn = document.querySelector(".close-btn");
        const prevBtn = document.querySelector(".prev-btn");
        const nextBtn = document.querySelector(".next-btn");

        let currentIndex = 0;

        // open lightbox
        images.forEach((img, index) => {
            img.addEventListener("click", function () {
                currentIndex = index;
                showImage();
                lightbox.style.display = "flex";
            });
        });

        function showImage() {
            lightboxImg.src = images[currentIndex].src;
        }

        // next
        nextBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            currentIndex = (currentIndex + 1) % images.length;
            showImage();
        });

        // prev
        prevBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage();
        });

        // close
        closeBtn.addEventListener("click", function () {
            lightbox.style.display = "none";
        });

        // click outside বন্ধ
        lightbox.addEventListener("click", function (e) {
            if (e.target !== lightboxImg) {
                lightbox.style.display = "none";
            }
        });

        // 👉 keyboard support (pro feature)
        document.addEventListener("keydown", function (e) {
            if (lightbox.style.display === "flex") {
                if (e.key === "ArrowRight") nextBtn.click();
                if (e.key === "ArrowLeft") prevBtn.click();
                if (e.key === "Escape") lightbox.style.display = "none";
            }
        });

    });
</script>
