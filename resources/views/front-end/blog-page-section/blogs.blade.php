<style>
    /* Blog Card */
    .blog-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid #f1f1f1;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.10);
    }

    /* Same Image Size */
    .blog-img {
        width: 100%;
        height: 260px;
        overflow: hidden;
    }

    .blog-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s ease;
    }

    .blog-card:hover .blog-img img {
        transform: scale(1.08);
    }

    /* Content */
    .blog-content {
        padding: 24px;
        height: calc(100% - 260px);
    }

    .blog-title {
        font-size: 24px;
        line-height: 34px;
        margin-bottom: 14px;
    }

    .blog-title a {
        color: #111;
        text-decoration: none;
        transition: 0.3s;
    }

    .blog-title a:hover {
        color: #0d6efd;
    }

    /* Equal Description Height */
    .blog-desc p {
        color: #666;
        line-height: 28px;
        margin-bottom: 0;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
<div class="section-full py-5 bg-white">

    <div class="container">

        @if(request()->routeIs('home.index'))
            <!-- TITLE START -->
            <div class="section-head text-left">
                <h2 class="m-b5" data-title="Blog">Our Latest Blog</h2>
                <div class="wt-separator-outer">
                    <div class="wt-separator site-bg-primary"></div>
                </div>
            </div>
            <!-- TITLE END -->
        @endif

        <!-- IMAGE CAROUSEL START -->
        <div class="section-content">

            <div class="row">
                <div class="row g-4">

                    @forelse($blogs as $item)
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-card h-100">

                                <!-- Image -->
                                <div class="blog-img">
                                    <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                    </a>
                                </div>

                                <!-- Content -->
                                <div class="blog-content d-flex flex-column">

                                    <div class="d-flex justify-content-between">
                                        <div class="mb-2 text-muted small">
                                            <i class="fa fa-calendar-alt me-1 text-primary"></i>
                                            {{ $item->created_at->format('d M Y') }}
                                        </div>

                                        <div class="mb-2">
                                            <span class="small">
                                                <i class="fa fa-user me-1 text-primary"></i> <a href="javascript:void(0)"
                                                    class="text-dark fw-semibold">Admin</a>
                                            </span>
                                        </div>
                                    </div>

                                    <h3 class="blog-title">
                                        <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h3>

                                    <div class="blog-desc">
                                        <p>{!! $item->short_description !!}</p>
                                    </div>

                                    <div class="mt-auto pt-3">
                                        <a href="{{ route('blog.show', [$item->id, $item->slug]) }}"
                                            class="btn btn-outline-dark btn-sm rounded-pill px-4">
                                            Read More
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <x-no-data-found></x-no-data-found>
                    @endforelse

                </div>
            </div>
            @if (request()->routeIs('blog.index'))
                <!-- Pagination Start -->
                <div class="d-flex justify-content-center">
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>

    </div>
</div>
