<style>
    .service-image-box {
        width: 100%;
        height: 250px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .service-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<div class="section-full py-5">
    <div class="container">
        <!-- TITLE START -->
        <div class="sec-title">
            <div class="title">{!! business_setting('service_section_sub_title') !!}</div>
            <h2><span> {!! business_setting('service_section_title') !!} </span></h2>
        </div>
        <!-- TITLE END -->
        <div class="row">
            @foreach ($services as $item)

                <div class="col-lg-4 col-md-6">
                    <div
                        class="wt-icon-box-wraper center bdr-1 bdr-gray-light bdr-solid m-b30 p-a20 hover-box-effect  v-icon-effect">
                        <div class="icon-md m-b20 service-image-box">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                        </div>
                        <div class="icon-content">
                            <h4 class="wt-tilte ">{{ $item->title }}</h4>
                            <p>{!! $item->short_description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <!-- <a href="project-detail.html" class="btn-half site-button button-lg m-t50"><span>View All</span><em></em></a> -->
        </div>
    </div>
</div>
