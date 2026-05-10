<x-guest-layout>

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
            height: 220px;
            overflow: hidden;
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* 🔥 important */
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
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :image="business_image('gallery_page_banner_img')" />
        <!-- INNER PAGE BANNER END -->
        @if($galleryImages->isNotEmpty())
            <div class="py-5">
                <div class="container">
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

                    <!-- ✅ Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $galleryImages->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        @else
            <x-no-data-found></x-no-data-found>
        @endif

    </div>
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

</x-guest-layout>
