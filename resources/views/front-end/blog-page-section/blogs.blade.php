<div class="section-full p-t90 p-b60 bg-white">

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
                @foreach ($blogs as $item )
                <div class="col-lg-6 col-md-6">
                    <div class="blog-post latest-blog-1 date-style-2">
                        <div class="wt-post-media wt-img-effect zoom-slow">

                            <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                            </a>
                        </div>
                        <div class="wt-post-info">
                            <div class="post-date"> <strong>{{ $item->created_at->format('d M Y') }} </strong></div>

                            <div class="wt-post-meta">
                                <ul class="clearfix">
                                    <li class="post-author">
                                        <div class="post-author-pic">
                                            <!-- <span><img src="images/testimonials/pic1.jpg" alt=""></span> -->
                                            <span><strong> By</strong> <a href="javascript:void(0)">Admin</a></span>
                                        </div>
                                    </li>
                                    <!-- <li class="post-comment"><i class="fa fa fa-comments site-text-primary"></i><a href="post-right-sidebar.html">10 Comment</a> </li> -->
                                </ul>
                            </div>

                            <div class="wt-post-title mt-2">
                                <h3 class="post-title">
                                    <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                        {{ $item->name }}</a>
                                </h3>
                            </div>

                            <div class="wt-post-text">
                                <p>{{ $item->short_description }}</p>
                            </div>

                            <div class="readmore-line">
                                <a href="{{ route('blog.show', [$item->id, $item->slug]) }}" class="site-button-ink site-text-primary font-weight-900 ">Read More</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
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