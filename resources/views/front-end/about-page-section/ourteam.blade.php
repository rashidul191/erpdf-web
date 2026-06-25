<style>
    .team-img-box {
        margin: 0 auto;
        width: 220px;
        height: 250px;
        /* same height for all */
        overflow: hidden;
    }

    .team-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* important */
    }

    @media screen and (max-width: 768px) {
        .team-img-box {
            width: 100% !important;
            height: 300px !important;
        }
    }
</style>
@php
    $top = $teams->first();
    $bottom = $teams->skip(1);
@endphp

<div class="section-full pt-5 pb-5 bg-white">
    <div class="container">

        <!-- TOP -->
        @if($top)
            <div class="row justify-content-center mb-4">
                <div class="col-lg-4 col-md-6">
                    <div class="wt-team-arc2 text-center">
                        <div class="wt-media team-img-box">
                            <a href="{{ route('team.show', [$top->id, $top->slug]) }}">
                                <img src="{{ asset($top->image) }}" class="w-100">
                            </a>
                        </div>

                        <div class="wt-info mt-3">
                            <a href="{{ route('team.show', [$top->id, $top->slug]) }}">
                                <h4>{{ $top->name }}</h4>
                            </a>
                            <p>{{ $top->designation }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!-- BOTTOM -->
        <div class="row justify-content-center">
            @foreach($bottom as $team)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="wt-team-arc2 text-center">
                        <div class="wt-media team-img-box">
                            <a href="{{ route('team.show', [$team->id, $team->slug]) }}">
                                <img src="{{ asset($team->image) }}" class="w-100">
                            </a>
                        </div>

                        <div class="wt-info mt-3">
                            <a href="{{ route('team.show', [$team->id, $team->slug]) }}">
                                <h4>{{ $team->name }}</h4>
                            </a>
                            <p>{{ $team->designation }}</p>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

        <!-- PAGINATION -->

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $teams->links('pagination::bootstrap-4') }}
        </div> --}}


    </div>
</div>
