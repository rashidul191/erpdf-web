<style>
    .service-section {
        padding: 100px 0;
        background-color: #eef1f3;
    }

    .service-card {
        height: 100%;
        border-radius: 5px;
        overflow: hidden;
        transition: 0.4s;
        background: #fff;
    }

    .service-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(2, 78, 153, 0.15);
    }

    .service-image-box {
        width: 100%;
        height: 240px;
        overflow: hidden;
    }

    .service-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
    }

    .service-card:hover .service-image-box img {
        transform: scale(1.08);
    }

    .service-content {
        padding: 22px 22px 30px;
        display: flex;
        flex-direction: column;
        height: calc(100% - 240px);
    }

    .service-title {
        font-size: 22px;
        font-weight: 700;
        color: #024e99;
    }

    .service-description {
        text-align: justify;
        color: #555;
        line-height: 1.8;
        flex-grow: 1;
    }



    @media(max-width: 768px) {
        .service-image-box {
            height: 200px;
        }

        .service-title {
            font-size: 20px;
        }
    }
</style>

<div class="service-section">
    <div class="container">

        <!-- TITLE START -->
        <div class="sec-title">
            <div class="title">{!! business_setting('service_section_sub_title') !!}</div>
            <h2><span>{!! business_setting('service_section_title') !!}</span></h2>
        </div>
        <!-- TITLE END -->

        <div class="row g-4">

            @foreach ($services as $item)

                <div class="col-lg-3 col-md-6 col-12 d-flex">

                    <div class="service-card w-100">

                        <!-- Image -->
                        <div class="service-image-box">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                        </div>

                        <!-- Content -->
                        <div class="service-content">

                            <h4 class="service-title">
                                {{ $item->title }}
                            </h4>

                            <div class="service-description">
                                {!! \Str::limit(strip_tags($item->short_description), 120) !!}
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('service.show', $item->id) }}" class="more-btn">
                                    Read More
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</div>
