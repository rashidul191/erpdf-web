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
            {{ request()->routeIs('home.index') ? '190px' : '250px' }}
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
        background: rgba(0, 0, 0, 0.85);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        flex-direction: column;
    }

    /* 👉 বড় image */
    #lightbox img {
        max-width: 85%;
        max-height: 75%;
        border-radius: 5px;
        object-fit: contain;
    }

    /* Lightbox title */
    #lightbox-title {
        color: #fff;
        font-size: 18px;
        margin-top: 15px;
        padding: 10px 20px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        max-width: 80%;
        text-align: center;
    }

    /* Close */
    .close-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 40px;
        color: #fff;
        cursor: pointer;
        z-index: 10000;
        transition: 0.3s;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.3);
    }

    .close-btn:hover {
        transform: rotate(90deg);
        background: rgba(255, 0, 0, 0.3);
    }

    /* 👉 Arrow buttons */
    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 45px;
        color: #fff;
        cursor: pointer;
        padding: 15px;
        user-select: none;
        z-index: 10000;
        opacity: 0.7;
        transition: 0.3s;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-btn:hover {
        opacity: 1;
        background: rgba(0, 0, 0, 0.6);
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

        .nav-btn {
            width: 40px;
            height: 40px;
            font-size: 25px;
            padding: 5px;
        }

        #lightbox img {
            max-height: 60%;
        }

        #lightbox-title {
            font-size: 14px;
            padding: 8px 15px;
            max-width: 90%;
        }

        .close-btn {
            top: 10px;
            right: 15px;
            font-size: 30px;
            width: 40px;
            height: 40px;
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
                            <img src="{{ $item->image }}" alt="{{ $item->title ?? 'Gallery Image' }}" class="gallery-img" data-title="{{ $item->title ?? '' }}">
                        </div>
                    </li>
                @endforeach
            </ul>

            <!-- Lightbox -->
            <div id="lightbox">
                <span class="close-btn" id="closeLightbox">&times;</span>
                <!-- arrows -->
                <span class="nav-btn prev-btn" id="prevImage">&#10094;</span>
                <span class="nav-btn next-btn" id="nextImage">&#10095;</span>
                <img id="lightbox-img" alt="">
                <div id="lightbox-title"></div>
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
        const lightboxTitle = document.getElementById("lightbox-title");
        const closeBtn = document.getElementById("closeLightbox");
        const prevBtn = document.getElementById("prevImage");
        const nextBtn = document.getElementById("nextImage");

        let currentIndex = 0;

        // open lightbox
        images.forEach((img, index) => {
            img.addEventListener("click", function (e) {
                e.stopPropagation();
                currentIndex = index;
                showImage();
                lightbox.style.display = "flex";
                document.body.style.overflow = "hidden"; // prevent scroll
            });
        });

        function showImage() {
            const img = images[currentIndex];
            lightboxImg.src = img.src;
            lightboxImg.alt = img.alt;

            // Show title if exists, otherwise hide
            const title = img.getAttribute('data-title');
            if (title && title.trim() !== '') {
                lightboxTitle.textContent = title;
                lightboxTitle.style.display = 'block';
            } else {
                lightboxTitle.style.display = 'none';
            }
        }

        // Close function
        function closeLightbox() {
            lightbox.style.display = "none";
            document.body.style.overflow = "auto";
        }

        // close button - fixed
        closeBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            e.preventDefault();
            closeLightbox();
        });

        // next
        nextBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            e.preventDefault();
            currentIndex = (currentIndex + 1) % images.length;
            showImage();
        });

        // prev
        prevBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            e.preventDefault();
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage();
        });

        // click outside বন্ধ
        lightbox.addEventListener("click", function (e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        // 👉 keyboard support
        document.addEventListener("keydown", function (e) {
            if (lightbox.style.display === "flex") {
                if (e.key === "ArrowRight") {
                    e.preventDefault();
                    nextBtn.click();
                }
                if (e.key === "ArrowLeft") {
                    e.preventDefault();
                    prevBtn.click();
                }
                if (e.key === "Escape") {
                    closeLightbox();
                }
            }
        });

    });
</script>
