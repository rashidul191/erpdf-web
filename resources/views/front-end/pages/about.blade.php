<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
         <x-page-banner :image="business_image('about_page_banner_img')"/>
        <!-- INNER PAGE BANNER END -->

        <!-- WELCOME SECTION START -->
          @include('front-end.about-page-section.about-section')
        <!-- WELCOME  SECTION END -->

        <!-- OUR SPECIALLIZATION START -->
        {{-- @include('front-end.about-page-section.specialization') --}}
        <!-- OUR SPECIALLIZATION END -->

        <!-- OUR SERVICES START -->
        {{-- @include('front-end.about-page-section.services') --}}
        <!-- OUR SERVICES END -->

        <!-- OUR STORY SECTION START -->
        {{-- @include('front-end.about-page-section.ourstory') --}}
        <!-- OUR STORY SECTION END -->

        <!-- OUR TEAM START -->
        {{-- @include('front-end.about-page-section.ourteam') --}}
        <!-- OUR TEAM END -->



    </div>
    <!-- CONTENT END -->

</x-guest-layout>
