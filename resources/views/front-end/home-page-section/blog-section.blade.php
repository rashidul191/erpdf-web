<div class="blog-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="title">{!! business_setting('blog_section_sub_title') !!}</div>
            <h2><span>{!! business_setting('blog_section_title') !!} </span></h2>
        </div>
        <div class="inner-container">
            <div class="clearfix row g-0">
                <!-- Column -->
                @foreach ($blogs as $item)
                    <div class="column col-12 p-3 border bg-white mb-3">
                        <!-- News Block -->
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="clearfix">
                                    <!-- Image Column -->
                                    <div class="image-column col-lg-4 col-sm-12">
                                        <div class="inner-column">
                                            <div class="image">
                                                <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                                    <img src="{{ asset($item->image) }}" alt="{!! $item->name !!}" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Content Column -->
                                    <div class="content-column col-lg-8 col-sm-12">
                                        <div class="p-3 p-md-4">
                                            <div class="arrow-one"></div>
                                            <div class="title mb-2">
                                                <h4>
                                                    <a href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                                        {!! $item->name !!}</a>
                                                </h4>
                                            </div>
                                            <p class="post-date">{!! $item->short_description !!} </p>
                                            <div class="mt-4">
                                                <a class="blog-more-btn"
                                                    href="{{ route('blog.show', [$item->id, $item->slug]) }}">
                                                    Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
