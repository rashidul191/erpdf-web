<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$roomCategory->name ?? null" />
        <!-- INNER PAGE BANNER END -->


        <!-- ROOMS SLIDER START -->
        <div class="section-full p-tb90 bg-gray">
            <!-- <div class="container">
                <div class="section-head text-center">
                    <h2 class="m-b5" data-title="Suites">Our Rooms & Suites</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator site-bg-primary"></div>
                    </div>
                </div>             
            </div> -->

            <div class="container-fluid">
                <!-- IMAGE CAROUSEL START -->
                <div class="section-content">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($rooms as $item )
                        <!-- COLUMNS 1 -->
                        <div class="col item">
                            <div class="room-rent-section-outer">
                                <div class="room-rent-section">
                                    <div class="rooms-pic-section">
                                        <div class="wt-media">
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}">
                                            <div class="overlay-bx-3"></div>
                                            <h3 class="m-b0 wt-title">{{ $item->name }}</h3>
                                        </div>

                                    </div>
                                    <div class="room-info-section text-black">
                                        <!-- <span>TK{{ $item->price }}/night</span> -->
                                        <span>TK {{ number_format($item->price) }}</span>
                                        <ul class="clearfix">
                                            <li><i class="fa fa-expand"></i> <strong>Size:</strong> {{ $item->size }}m² </li>
                                            <li><i class="fa fa-user"></i> <strong>Duration:</strong> {{ $item->time_duration }} </li>
                                            <li><i class="fa fa-eye"></i> <strong>View:</strong> {{ $item->view }} </li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="{{ route('room.show', [$item->id, $item->slug]) }}" class="btn-half site-button button-lg"><span>More</span><em></em></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Pagination Start -->
            <div class="d-flex justify-content-center">
                {{ $rooms->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!-- ROOMS  SLIDER END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>