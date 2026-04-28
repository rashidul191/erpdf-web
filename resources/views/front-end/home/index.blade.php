<x-guest-layout>
    <!-- CONTENT START -->
    <div class="page-content">

        <!-- SLIDER START -->
        @include('front-end.home.slider')
        <!-- SLIDER END -->


        <!-- WELCOME SECTION START -->
        @include('front-end.about-page-section.about-section')
        <!-- WELCOME  SECTION END -->


        <!-- OUR BLOG START -->
        @include('front-end.blog-page-section.blogs')
        <!-- OUR BLOG END -->

        <!-- OUR SPECIALLIZATION START -->
        @include('front-end.about-page-section.specialization')
        <!-- OUR SPECIALLIZATION END -->

        <!-- OUR SERVICES START -->
        @include('front-end.about-page-section.services')
        <!-- OUR SERVICES END -->


    </div>
    <!-- CONTENT END -->

</x-guest-layout>
