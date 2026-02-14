<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$searchText" />
        <!-- INNER PAGE BANNER END -->

        <!-- OUR ROOMS START -->
        @include('front-end.room-page-section.rooms')
        <!-- OUR ROOMS END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>