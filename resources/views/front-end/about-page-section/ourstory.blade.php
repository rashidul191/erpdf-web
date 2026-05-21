<style>
    .our-story-section {
        background: #ffffff;
        padding: 90px 0;
        position: relative;
    }

    /* middle line */
    .story-wrapper {
        position: relative;
    }

    .story-wrapper::before {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        width: 3px;
        height: 100%;
        background: #024e99;
        transform: translateX(-50%);
    }

    .story-item {
        position: relative;
        margin-bottom: 50px;
    }

    /* middle dot */
    .story-item::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 18px;
        height: 18px;
        background: #024e99;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        z-index: 5;
    }

    .story-image-box {
        overflow: hidden;
        border-radius: 10px;
    }

    .story-image-box img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        transition: 0.5s;
    }

    .story-item:hover .story-image-box img {
        transform: scale(1.05);
    }

    .story-content {
        background-color: #efefef;
        border-radius: 5px;
        padding: 30px;
        transition: all 0.3s ease-in-out;
    }

    .story-content:hover {
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.12);
    }

    .story-date {
        display: inline-block;
        margin-bottom: 15px;
        color: #024e99;
        font-weight: 700;
        font-size: 15px;
        letter-spacing: 1px;
    }

    .story-title {
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #111827;
        line-height: 1.4;
    }

    .story-description {
        color: #4b5563;
        line-height: 1.9;
        font-size: 16px;
        text-align: justify;
    }

    @media(max-width: 991px) {

        .story-wrapper::before,
        .story-item::before {
            display: none;
        }

        .story-image-box img {
            height: 260px;
        }

        .story-content {
            padding: 25px;
        }

        .story-title {
            font-size: 26px;
        }
    }
</style>

<div class="section-full our-story-section">
    <div class="container">

        <!-- TITLE -->
        <div class="section-head text-center mb-5">
            <h2 class="fw-bold">Our Story</h2>

            <div class="wt-separator-outer">
                <div class="wt-separator site-bg-primary"></div>
            </div>
        </div>

        <div class="story-wrapper">

            @foreach ($ourStories as $key => $item)

                <div class="story-item">

                    <div class="row align-items-center">

                        @if($key % 2 == 0)

                            <!-- IMAGE LEFT -->
                            <div class="col-lg-5">
                                <div class="story-image-box">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                </div>
                            </div>

                            <!-- EMPTY MIDDLE -->
                            <div class="col-lg-2"></div>

                            <!-- CONTENT RIGHT -->
                            <div class="col-lg-5">
                                <div class="story-content">

                                    @if($item->date)
                                        <div class="story-date">
                                            {{ $item->date }}
                                        </div>
                                    @endif

                                    <h3 class="story-title">
                                        {!! $item->title !!}
                                    </h3>

                                    <div class="story-description">
                                        {!! $item->description !!}
                                    </div>

                                </div>
                            </div>

                        @else

                            <!-- CONTENT LEFT -->
                            <div class="col-lg-5">
                                <div class="story-content text-lg-end">

                                    @if($item->date)
                                        <div class="story-date">
                                            {{ $item->date }}
                                        </div>
                                    @endif

                                    <h3 class="story-title">
                                        {!! $item->title !!}
                                    </h3>

                                    <div class="story-description">
                                        {!! $item->description !!}
                                    </div>

                                </div>
                            </div>

                            <!-- EMPTY MIDDLE -->
                            <div class="col-lg-2"></div>

                            <!-- IMAGE RIGHT -->
                            <div class="col-lg-5">
                                <div class="story-image-box">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                </div>
                            </div>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</div>
