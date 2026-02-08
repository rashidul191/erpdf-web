<x-guest-layout>
    <x-slot name="style">

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
        <style>
            .slick-prev,
            .slick-next {
                z-index: 1;
            }

            .slick-prev:before,
            .slick-next:before {
                font-size: 30px;
            }

            .slick-prev {
                left: 2%;
            }

            .slick-next {
                right: 2%;
            }

            .team_content:hover .img_box img {
                transform: scale(1.05);
            }
        </style>
    </x-slot> {{-- Slider Section Start  --}}
    @include('front-end.home.slider')
    {{-- Slider Section End  --}}


    <x-slot name="script">
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script>
            $(document).ready(function() {
                /* Here Slider Start */
                $('.hero_slider.autoplay').slick({
                    arrows: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
                /* Here Slider End */

                /* Team Slider Start */
                $('.team_slider.responsive').slick({
                    dots: false,
                    arrows: true,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                // slidesToScroll: 1,
                                // infinite: true,
                                // dots: true
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                                // slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 250,
                            settings: {
                                slidesToShow: 1,
                                // slidesToScroll: 1
                            }
                        }
                    ]
                });
                /* Team Slider End */
            });
        </script>
    </x-slot>
</x-guest-layout>
