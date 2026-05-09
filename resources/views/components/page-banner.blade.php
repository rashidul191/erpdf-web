@props(['title' => null, 'image' => null])

@php
    $finalImage = $image ?? '/images/banner-img.jpg';
    $pageTitle = $title ? $title : \Str::title(str_replace('-', ' ', request()->segment(1)));
@endphp

<section class="position-relative text-white">

    <!-- Background Image -->
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <img src="{{ asset($finalImage) }}" class="w-100 h-100 object-fit-cover" style="object-fit:cover;" alt="">
        <div class="bg-dark opacity-50 position-absolute top-0 start-0 w-100 h-100"></div>
    </div>

    <!-- Content -->
    <div class="container position-relative py-5">
        <div class="row align-items-center" style="min-height: 250px;">

            <div class="col-12 text-center">
                <h2 class="fw-bold mb-3">{{ $pageTitle }}</h2>

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 mb-0 fs-6">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.index') }}" class="text-white text-decoration-none">
                                Home <span class="icofont icofont-double-right"></span>
                            </a>
                        </li>
                        <li>
                            {{ $pageTitle }}
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</section>
