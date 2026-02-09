<div class="section-full p-tb90">
    <div class="container">
        <!-- TITLE START -->
        <div class="section-head text-left">
            <h2 class="m-b5" data-title="Services">Our Services</h2>
            <div class="wt-separator-outer">
                <div class="wt-separator site-bg-primary"></div>
            </div>
        </div>
        <!-- TITLE END -->
        <div class="row">
            @foreach ($services as $item )

           
            <div class="col-lg-4 col-md-6">
                <div class="wt-icon-box-wraper center bdr-1 bdr-gray-light bdr-solid m-b30 p-a20 hover-box-effect  v-icon-effect">
                    <div class="icon-md m-b20">
                        <!-- <span class="icon-cell"><i class="flaticon-wifi v-icon"></i></span> -->
                         <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    </div>
                    <div class="icon-content">
                        <h4 class="wt-tilte ">{{ $item->title }}</h4>
                        <p>{{ $item->sub_title }}</p>
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