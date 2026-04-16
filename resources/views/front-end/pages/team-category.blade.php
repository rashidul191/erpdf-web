<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="\Str::title($categoryName) ?? null" />
        <!-- INNER PAGE BANNER END -->


        <!-- OUR TEAM START -->
        @include('front-end.about-page-section.ourteam')
        <!-- OUR TEAM END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
