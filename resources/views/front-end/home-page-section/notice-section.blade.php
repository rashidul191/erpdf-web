<div class="notice-section mt-4 overflow-hidden">
    <div class="container ">
        <div class="d-flex align-items-cente shadow-sm">

            <!-- Notice Label -->
            <div class="bg-black text-white px-4 py-1 d-flex align-items-center">
                <p class="mb-0 fw-semibold text-uppercase">
                    Notice
                </p>
            </div>

            <!-- Scrolling Area -->
            <div class="notice-wrapper flex-grow-1 py-1">
                <div class="notice-track">

                    @foreach ($notices as $item)
                        <span class="notice-item">
                            {!! $item->title ?? '' !!}
                        </span>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .notice-wrapper {
        overflow: hidden;
        position: relative;
        white-space: nowrap;
        background-color: #ffffbf;
    }

    .notice-track {
        display: inline-block;
        white-space: nowrap;
        animation: noticeScroll 40s linear infinite;
    }

    .notice-item {
        display: inline-block;
        color: #000;
        font-size: 16px;
        font-weight: 400;
        position: relative;
    }

    .notice-item::before {
        content: "➤";
        font-size: 12px;
        margin-left: 25px;
    }

    @keyframes noticeScroll {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* Hover করলে pause হবে */
    .notice-wrapper:hover .notice-track {
        animation-play-state: paused;
    }
</style>
