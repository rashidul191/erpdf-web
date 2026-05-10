<div class="experts-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <div class="title">{!! business_setting('team_sub_title') !!}</div>
                    <h2><span>{!! business_setting('team_title') !!}</span></h2>
                </div>
                @if(request()->routeIs('home.index'))
                    <div class="pull-right">
                        <a href="#" class="experts">all experts <span class="arrow ti-angle-right"></span></a>
                    </div>
                @endif
            </div>
        </div>

        <div class="row clearfix">
            @forelse ($teams as $item)
                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="{{ route('team.show', [$item->id, $item->slug]) }}">
                                <img src="{{ asset($item->image) }}" alt="" />
                            </a>
                            <!-- Social Box -->
                            <ul class="social-box">
                                <li><a href="{{ $item->twitter_link }}" class="icofont-twitter"></a></li>
                                <li><a href="{{ $item->fb_link }}" class="icofont-facebook"></a></li>
                                <li><a href="{{ $item->instagram_link }}" class="icofont-instagram"></a></li>
                            </ul>
                        </div>
                        <div class="lower-box mt-0">
                            <h4>
                                <a href="{{ route('team.show', [$item->id, $item->slug]) }}">
                                    {{ $item->name }}
                                </a>
                            </h4>
                            <div class="designation">{{ $item->designation }}</div>
                        </div>
                    </div>
                </div>
                <!-- Team Block -->
            @empty
                <div class="text-center py-5 ">
                    <h3 class="text-danger text-center">Data Not Found!</h3>
                </div>
            @endforelse
        </div>


        @if(request()->routeIs('team.index'))
            <!-- Pagination Start -->
            <div class="d-flex justify-content-center">
                {{ $teams->links('pagination::bootstrap-4') }}
            </div>
        @endif


    </div>
</div>
