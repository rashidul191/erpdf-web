<x-guest-layout>

    <style>
        .blog-title {
            line-height: 1.5;
            color: #111827;
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
        {{-- <x-page-banner :image="getRawImage($blog, 'banner_image', true)" /> --}}
        <x-page-banner :image="$blog->banner_image ?? null" />

        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="blog-details-page py-5 bg-light">
            <div class="container">
                <div class="row g-4">

                    <!-- Main Content -->
                    <div class="col-lg-8">

                        <div class="bg-white shadow-sm rounded-3 overflow-hidden">

                            <!-- Featured Image -->
                            <div class="blog-thumbnail">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->name }}" class="img-fluid w-100">
                            </div>

                            <!-- Content -->
                            <div class="p-4">

                                <!-- Meta -->
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-3 text-muted small">
                                    <span>
                                        <i class="fa fa-calendar-alt me-1 text-primary"></i>
                                        {{ $blog->created_at->format('d M Y') }}
                                    </span>

                                    <span>
                                        <i class="fa fa-user me-1 text-primary"></i>
                                        Admin
                                    </span>
                                </div>

                                <!-- Title -->
                                <h2 class="fw-bold mb-4 blog-title">
                                    {{ $blog->name }}
                                </h2>

                                <!-- Description -->
                                <div class="blog-description">
                                    {!! $blog->description !!}
                                </div>

                            </div>
                        </div>

                        <!-- Gallery -->
                        {{-- @if (!empty($blog->gallery_image))
                        <div class="bg-white shadow-sm rounded-3 p-4 mt-4">
                            <h4 class="fw-bold mb-4">Gallery</h4>

                            <div class="row g-3">
                                @foreach ($blog->gallery_image as $image)
                                <div class="col-md-4 col-6">
                                    <div class="gallery-item">
                                        <img src="{{ asset($image) }}" class="img-fluid rounded-3" alt="">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif --}}

                        @if($relatedBlogs->count() > 0)
                            <!-- Related Blogs -->
                            <div class="mt-5">

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h3 class="fw-bold mb-0">Related Posts</h3>
                                </div>

                                <div class="row g-4">

                                    @foreach ($relatedBlogs as $item)
                                        <div class="col-md-6">

                                            <div
                                                class="card border-0 shadow-sm h-100 rounded-3 overflow-hidden related-blog-card">

                                                <div class="overflow-hidden">
                                                    <img src="{{ asset($item->image) }}" class="card-img-top related-blog-image"
                                                        alt="{{ $item->name }}">
                                                </div>

                                                <div class="card-body">

                                                    <small class="text-muted d-block mb-2">
                                                        <i class="fa fa-calendar-alt me-1"></i>
                                                        {{ $item->created_at->format('d M Y') }}
                                                    </small>

                                                    <h5 class="fw-bold">
                                                        <a href="{{ route('blog.show', [$item->id, $item->slug]) }}"
                                                            class="text-dark text-decoration-none">
                                                            {{ $item->name }}
                                                        </a>
                                                    </h5>

                                                    <p class="text-muted mb-3">
                                                        {!! Str::limit(strip_tags($item->short_description), 100) !!}
                                                    </p>

                                                    <a href="{{ route('blog.show', [$item->id, $item->slug]) }}"
                                                        class="btn btn-primary btn-sm rounded-pill px-4">
                                                        Read More
                                                    </a>

                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif

                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">

                        <!-- Search -->
                        <div class="bg-white shadow-sm rounded-3 p-4 mb-4">
                            <h4 class="fw-bold mb-3">Search</h4>

                            <form action="{{ route('blog.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search_text" class="form-control"
                                        placeholder="Search blog...">

                                    <button class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Recent Posts -->
                        <div class="bg-white shadow-sm rounded-3 p-4 mb-4">
                            <h4 class="fw-bold mb-4">Recent Posts</h4>

                            @foreach ($recentBlogs as $item)
                                <div class="d-flex gap-3 mb-4 recent-post">

                                    <div class="recent-post-image">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                            class="img-fluid rounded">
                                    </div>

                                    <div>
                                        <small class="text-muted d-block mb-1">
                                            {{ $item->created_at->format('d M Y') }}
                                        </small>

                                        <h6 class="mb-0">
                                            <a href="{{ route('blog.show', [$item->id, $item->slug]) }}"
                                                class="text-dark text-decoration-none">
                                                {{ $item->name }}
                                            </a>
                                        </h6>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        <!-- Categories -->
                        <div class="bg-white shadow-sm rounded-3 p-4 mb-4">
                            <h4 class="fw-bold mb-3">Categories</h4>

                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($categories as $item)
                                    <a href="javascript:void(0)" class="btn btn-light border rounded-pill px-3 py-2">
                                        {{ $item->name }}
                                    </a>
                                @endforeach
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
