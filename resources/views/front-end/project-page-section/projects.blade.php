 <div class="project-section section-padding">
     <div class="auto-container">
         @if(request()->routeIs('home.index'))
         <!-- Sec Title -->
         <div class="sec-title">
             <div class="clearfix">
                 <div class="pull-left">
                     <div class="title">{!! business_setting('project_sub_title') !!}</div>
                     <h2><span>{!! business_setting('project_title') !!}</span></h2>
                 </div>
                 <!-- <div class="pull-right">
                        <a href="service.html" class="cases">all Cases <span class="arrow ti-angle-right"></span></a>
                    </div> -->
             </div>
         </div>
         @endif

     </div>
     <div class="outer-container">
         <!-- <div class="row clearfix">

             @foreach ($projects as $item)

             @if ($loop->index == 0)
             <div class="column col-lg-6 col-md-12 col-sm-12">
                 <div class="row clearfix">
                     @endif
                     @if ($loop->index == 0 || $loop->index == 1)
                     <div class="inner-column col-lg-6 col-md-6 col-sm-12">
                         @include('front-end.partials.project-card', ['item' => $item])
                     </div>
                     @endif
                     @if ($loop->index == 2)
                     <div class="inner-column col-lg-12 col-md-12 col-sm-12">
                         @include('front-end.partials.project-card', ['item' => $item])
                     </div>
                 </div>
             </div>
             @endif

             @if ($loop->index == 3)
             <div class="column col-lg-6 col-md-12 col-sm-12">
                 @include('front-end.partials.project-card', ['item' => $item])
             </div>
             @endif

             @endforeach
         </div> -->

         <div class="row clearfix">
             @foreach ($projects as $item)
             <div class="column col-lg-4 col-md-6 col-sm-12">
                 @include('front-end.partials.project-card', ['item' => $item])
             </div>
             @endforeach
         </div>

         @if(!request()->routeIs('home.index'))
         <!-- Pagination Start -->
         <div class="d-flex justify-content-center">
             {{ $projects->links('pagination::bootstrap-4') }}
         </div>
         @endif

     </div>
 </div>