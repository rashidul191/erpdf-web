<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <x-page-banner :image="business_image('gallery_page_banner_img')" />
        <!-- INNER PAGE BANNER END -->

        <!-- OUR GALLERY  -->
        <div class="section-full p-tb90">
            <div class="container">
                <div class="widget widget_gallery mfp-gallery">
                    <ul>
                        @foreach ($galleryImages as $item )
                        <li>
                            <div class="wt-post-thum border">
                                <a href="{{ $item->image }}" class="mfp-link">
                                    <img src="{{ $item->image }}" alt="{{ $item->title }}">
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Pagination Start -->
                <div class="d-flex justify-content-center">
                    {{ $galleryImages->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT END -->

</x-guest-layout>