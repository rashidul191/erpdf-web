<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :image="business_image('pp_page_banner_img')" />
        <!-- INNER PAGE BANNER END -->

        <!-- OUR STORY SECTION START -->
        @include('front-end.about-page-section.ourstory')
        <!-- OUR STORY SECTION END -->
    </div>
    <!-- CONTENT END -->

</x-guest-layout>
