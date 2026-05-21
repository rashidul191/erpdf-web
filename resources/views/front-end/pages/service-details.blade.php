<x-guest-layout>

    <style>
        .blog-title {
            line-height: 1.5;
            color: #111827;
        }

        .blog-main-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        .blog-description {
            font-size: 16px;
            line-height: 1.9;
            color: #4b5563;
            text-align: justify;
        }

        .blog-description p {
            margin-bottom: 18px;
        }

        .gallery-item img {
            height: 220px;
            width: 100%;
            object-fit: cover;
            transition: 0.4s;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .related-blog-image {
            height: 220px;
            object-fit: cover;
            transition: 0.4s;
        }

        .related-blog-card:hover .related-blog-image {
            transform: scale(1.05);
        }

        .recent-post-image img {
            width: 90px;
            height: 70px;
            object-fit: cover;
        }

        .recent-post:last-child {
            margin-bottom: 0 !important;
        }



        @media(max-width: 768px) {

            .blog-title {
                font-size: 24px;
            }

            .blog-main-image {
                height: 220px;
            }

            .gallery-item img {
                height: 150px;
            }

            .related-blog-image {
                height: 180px;
            }


        }
    </style>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$service->name" :image="getRawImage($service, 'banner_image', true)" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="blog-details-page py-5 bg-light">
            <div class="container">
                <div class="row g-4">
                    <!-- Main Content -->
                    <div class="col-12">
                        <div class="bg-white shadow-sm rounded-3 overflow-hidden">

                            <!-- Featured Image -->
                            <div class="blog-thumbnail overflow-hidden">
                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                                    class="img-fluid w-100 blog-main-image">
                            </div>

                            <!-- Content -->
                            <div class="p-4">

                                <!-- Meta -->
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-3 text-muted small">
                                    <span>
                                        <i class="fa fa-calendar-alt me-1"></i>
                                        {{ $service->created_at->format('d M Y') }}
                                    </span>

                                    <span>
                                        <i class="fa fa-user me-1"></i>
                                        Admin
                                    </span>
                                </div>

                                <!-- Title -->
                                <h3 class="fw-bold mb-4 blog-title">
                                    {{ $service->title }}
                                </h3>

                                <!-- Description -->
                                <div class="blog-description">
                                    {!! $service->short_description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->

</x-guest-layout>
