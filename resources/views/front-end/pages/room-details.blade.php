<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content ">
        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$room->name ?? null" :image="$room->image" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-tb90 ">
            <div class="container">

                <div class="room-detail-outer">
                    <div class="wt-post-media">
                        <!--Fade slider-->
                        <div
                            class="owl-carousel owl-fade-slider-one owl-btn-vertical-center owl-dots-bottom-right m-b30">

                            <div class="item">
                                <div class="wt-thum-bx">
                                    <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="img-fluid w-100"
                                        style="height: 400px; object-fit: cover;">
                                </div>
                            </div>

                            @foreach ($room->gallery_image as $image)
                                <div class="item">
                                    <div class="wt-thum-bx">
                                        <img src="{{ asset($image) }}" alt="{{ basename($image) }}">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!--fade slider END-->
                        <div class="room-facility">
                            <div class="room-discription">
                                <h2>{{ $room->name }}</h2>
                                <h4>Price: TK {{ number_format($room->price) }}</h4>

                                <ul
                                    class="list-unstyled text-dark row row-cols-1 row-cols-md-3 justify-content-between align-items-center">
                                    <li class="col p-2"><i class="fa fa-expand"></i> <strong>Size:</strong>
                                        {{ number_format($room->size ?? '0') }}m² </li>
                                    <li class="col p-2"><i class="fa fa-clock-o"></i> <strong>Duration:</strong>
                                        {{ $room->time_duration ?? 'N/A' }} </li>
                                    <li class="col p-2"><i class="fa fa-hotel"></i> <strong>Room Type:</strong>
                                        {{ $room->type->name ?? 'N/A' }} </li>
                                    <li class="col p-2"><i class="fa fa-user"></i> <strong>Adult:</strong>
                                        {{ number_format($room->adult ?? 0) }} </li>
                                    <li class="col p-2"><i class="fa fa-users"></i> <strong>Child:</strong>
                                        {{ number_format($room->child ?? 0) }} </li>
                                    <li class="col p-2"><i class="fa fa-eye"></i> <strong>View:</strong>
                                        {{ $room->view ?? 'N/A' }} </li>
                                </ul>
                                <p>{!! $room->description ?? '' !!}</p>
                            </div>


                            <div class="room-Rates m-b30">
                                <h3>Reviews</h3>
                                <div class="review-overview clearfix">
                                    <div class="review-rate-box">
                                        <span class="rating-rate-box-total">4.8</span>
                                        <span class="rating-rate-box-percent">out of 5.0</span>
                                        <div class="star-Rating-input">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="rating-bars">
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Service<strong
                                                    class="rate-count">4.5</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md"
                                                        role="progressbar" aria-valuenow="85" aria-valuemin="10"
                                                        aria-valuemax="100" style="width: 85%;">
                                                        <span class="popOver" data-toggle="tooltips"
                                                            data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Value for Money<strong
                                                    class="rate-count">4.1</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md"
                                                        role="progressbar" aria-valuenow="70" aria-valuemin="10"
                                                        aria-valuemax="100" style="width: 70%;">
                                                        <span class="popOver" data-toggle="tooltips"
                                                            data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Location<strong
                                                    class="rate-count">4.8</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md"
                                                        role="progressbar" aria-valuenow="90" aria-valuemin="10"
                                                        aria-valuemax="100" style="width: 90%;">
                                                        <span class="popOver" data-toggle="tooltips"
                                                            data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Cleanliness<strong
                                                    class="rate-count">2.5</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md"
                                                        role="progressbar" aria-valuenow="35" aria-valuemin="10"
                                                        aria-valuemax="100" style="width: 35%;">
                                                        <span class="popOver" data-toggle="tooltips"
                                                            data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Room Comment Section Start -->
                @include('front-end.room-page-section.room-comment')
                <!-- Room Comment Section End -->
            </div>
        </div>
        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
