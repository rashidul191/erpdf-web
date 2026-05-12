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
            <div class="notice-wrapper">
                <div class="notice-track">

                    @foreach ($notices as $item)
                        <span class="notice-item">
                            {!! $item->title !!}
                        </span>
                    @endforeach

                    {{-- duplicate for smooth infinite loop --}}
                    @foreach ($notices as $item)
                        <span class="notice-item">
                            {!! $item->title !!}
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
        white-space: nowrap;
        position: relative;
        background: #ffffbf;
    }

    .notice-track {
        padding-top: 5px;
        display: inline-flex;
        align-items: center;
        width: max-content;
        animation: ticker 50s linear infinite;
    }

    .notice-item {
        display: inline-block;
        padding-right: 80px;
        color: #000;
        font-size: 16px;
    }

    .notice-item::before {
        content: "➤";
        margin-right: 5px;
        font-size: 12px;
    }

    @keyframes ticker {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    .notice-wrapper:hover .notice-track {
        animation-play-state: paused;
    }
</style>
