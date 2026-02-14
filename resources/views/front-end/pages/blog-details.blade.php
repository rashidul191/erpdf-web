<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">


        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$blog->name ?? null" :image="$blog->image" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-tb90">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-12">
                        <!-- BLOG START -->
                        <div class="blog-post date-style-1 blog-detail text-black">
                            <div class="wt-post-media clearfix m-b30">
                                <ul class="grid-post">
                                    <li>
                                        <div class="portfolio-item wt-img-effect zoom-slow">
                                            <img class="img-responsive" src="{{ asset($blog->image) }}" alt="{{ $blog->name }}">
                                        </div>
                                    </li>

                                    @foreach ($blog->gallery_image as $image )
                                    <li>
                                        <div class="portfolio-item wt-img-effect zoom-slow">
                                            <img class="img-responsive" src="{{ asset($image) }}" alt="">
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="wt-post-meta ">
                                <ul>
                                    <li class="post-date"><i class="fa fa-calendar"></i><strong>{{ $blog->created_at->format('d M') }}</strong>
                                        <span> {{ $blog->created_at->format('Y') }}</span>
                                    </li>
                                    <li class="post-author"><i class="fa fa-user"></i>By <span>Admin</span></li>
                                    <!-- <li class="post-comment"><i class="fa fa-comment"></i>21 <span>Comment</span> -->
                                    </li>
                                </ul>
                            </div>

                            <div class="wt-post-title ">
                                <h3 class="post-title">{{ $blog->name }}</h3>
                            </div>

                            <div class="wt-post-text">
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </div>

                        <div class="section-content">
                            <!-- TITLE START -->
                            <div class="text-left section-head">
                                <h2 class="m-b5">Related Post</h2>
                                <div class="wt-separator-outer">
                                    <div class="wt-separator site-bg-primary"></div>
                                </div>
                            </div>
                            <!-- TITLE END -->
                            <!-- BLOG section -->
                            <div class="section-content">
                                <div class="row">

                                    @foreach ($relatedBlogs as $item )
                                    <div class="col-lg-6 col-md-6">
                                        <div class="blog-post latest-blog-1 date-style-2">
                                            <div class="wt-post-media wt-img-effect zoom-slow">
                                                <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                                </a>
                                            </div>
                                            <div class="wt-post-info">
                                                <div class="post-date"> <strong>{{ $item->created_at->format('d M Y') }} </strong></div>

                                                <!-- <div class="wt-post-meta">
                                                    <ul class="clearfix">
                                                        <li class="post-author">
                                                            <div class="post-author-pic">
                                                                <span><img src="images/testimonials/pic1.jpg"
                                                                        alt=""></span>
                                                                <span><strong> By</strong> <a
                                                                        href="post-right-sidebar.html">Loretta
                                                                        Shelton</a></span>
                                                            </div>
                                                        </li>
                                                        <li class="post-comment"><i
                                                                class="fa fa fa-comments site-text-primary"></i><a
                                                                href="post-right-sidebar.html">10 Comment</a> </li>
                                                    </ul>
                                                </div> -->

                                                <div class="wt-post-title">
                                                    <h3 class="post-title"><a href="{{ route('blog.show', [$item->id, $item->slug]) }}">{{ $item->name }}</a></h3>
                                                </div>

                                                <div class="wt-post-text">
                                                    <p>{!! $item->short_description !!}</p>
                                                </div>

                                                <div class="readmore-line">
                                                    <a href="{{ route('blog.show', [$item->id, $item->slug]) }}"
                                                        class="site-button-ink site-text-primary font-weight-900 ">Read
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Blog Comment Section Start -->
                        @include('front-end.blog-page-section.blog-comment')
                        <!-- Blog Comment Section End -->
                        <!-- BLOG END -->
                    </div>

                    <!-- SIDE BAR START -->
                    <div class="col-lg-4 col-md-12">
                        <aside class="side-bar">
                            <!-- SEARCH -->
                            <div class="widget ">
                                <h4 class="widget-title">Search</h4>
                                <div class="search-bx">
                                    <form role="search" method="post">
                                        <div class="input-group">
                                            <input name="news-letter" type="text" class="form-control"
                                                placeholder="Write your text">
                                            <span class="input-group-btn">
                                                <button type="submit" class="site-button"><i
                                                        class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- OUR GALLERY  -->
                            <div class="widget widget_gallery mfp-gallery">
                                <h4 class="widget-title">Our Gallery</h4>
                                <ul>
                                    @foreach ($galleries as $item )
                                    <li>
                                        <div class="wt-post-thum">
                                            <a href="{{ asset($item->image) }}" class="mfp-link"><img
                                                    src="{{ asset($item->image) }}" alt="{{ $item->title }}"></a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- RECENT POSTS -->
                            <div class="widget  recent-posts-entry">
                                <h4 class="widget-title">Recent Posts</h4>
                                <div class="section-content">
                                    <div class="widget-post-bx">
                                        @foreach ($recentBlogs as $item )
                                        <div class="widget-post clearfix">
                                            <div class="wt-post-media">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                            </div>
                                            <div class="wt-post-info">
                                                <div class="wt-post-meta">
                                                    <ul>
                                                        <li class="post-author">{{ $item->created_at->format('d M') }}</li>
                                                    </ul>
                                                </div>
                                                <div class="wt-post-header">
                                                    <h6 class="post-title"> {{ $item->name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- NEWSLETTER -->
                            <!-- <div class="widget widget_newsletter-2 ">
                                <h4 class="widget-title">Newsletter</h4>
                                <div class="newsletter-bx p-a30">
                                    <div class="newsletter-icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>

                                    <div class="newsletter-content">
                                        <p>Subscribe to our mailing list to get the update to your email.</p>
                                    </div>
                                    <div class="m-t20">
                                        <form role="search" method="post">
                                            <div class="input-group">
                                                <input name="news-letter" class="form-control"
                                                    placeholder="ENTER YOUR EMAIL" type="text">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="site-button"><i
                                                            class="fa fa-paper-plane-o"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->

                            <!-- ABOUT AUTHOR -->
                            <!-- <div class="widget">
                                <h4 class="widget-title">About Author</h4>
                                <div class="widget-post m-b15">
                                    <img src="images/gallery/pic1.jpg" alt="" class="img-responsive">
                                </div>
                                <p>We are the dolor sit ametLorem Ipsum Proin gravida nibh vel velit auctor aliquet.
                                    Aenean sollicitudin, Consequat ipsum, nec sagittis sem nibh id elit nibh vel
                                    velit auctor aliquet.
                                    sem nibh Aenean sollicitudin,
                                </p>
                            </div> -->

                            <!-- OUR CLIENT -->
                            <!-- <div class="widget">
                                <h4 class="widget-title">Our Client</h4>
                                <div class="owl-carousel widget-client p-t10">
                              
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo wt-img-effect on-color">
                                                <a href="#"><img src="images/client-logo/w1.html" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                              
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo wt-img-effect on-color">
                                                <a href="#"><img src="images/client-logo/w2.html" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo wt-img-effect on-color">
                                                <a href="#"><img src="images/client-logo/w3.html" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> -->

                            <!-- TAGS -->
                            <div class="widget widget_tag_cloud">
                                <h4 class="widget-title">Categories</h4>
                                <div class="tagcloud">
                                    @foreach ($categories as $item)
                                    <a href="javascript:void(0);">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </aside>

                    </div>
                    <!-- SIDE BAR END -->
                </div>
            </div>
        </div>
        <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->

</x-guest-layout>