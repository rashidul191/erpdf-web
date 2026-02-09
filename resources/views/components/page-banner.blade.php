@props(['image'=>null])
@php
$pageTitle = Str::title(str_replace('-', ' ', request()->segment(1)));
@endphp
<div class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center" style="background-image:url('{{ $image ?? asset('front-end/assets/images/banner/1.jpg') }}')">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="wt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="text-white  font-80 font-weight-900">{{ $pageTitle }}</h2>
                </div>
            </div>
            <!-- BREADCRUMB ROW -->

            <div>
                <ul class="wt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>{{ $pageTitle }}</li>
                </ul>
            </div>

            <!-- BREADCRUMB ROW END -->
        </div>
    </div>
</div>