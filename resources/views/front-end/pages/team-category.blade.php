<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="\Str::headline($categoryName) ?? null" />
        <!-- INNER PAGE BANNER END -->

        @if($teams->count() > 0)
            <!-- OUR TEAM START -->
            @include('front-end.about-page-section.ourteam')
            <!-- OUR TEAM END -->
        @else
            <x-no-data-found></x-no-data-found>
        @endif

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
