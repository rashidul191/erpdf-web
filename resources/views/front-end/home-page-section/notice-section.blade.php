<style>
    .notice-bar {
        display: flex;
        align-items: center;
        overflow: hidden;
        background: #fff8cc;
        /* border-radius: 10px; */
        border: 1px solid #eee;
    }

    .notice-label {
        background: #000;
        color: #fff;
        padding: 10px 25px;
        font-size: 15px;
        font-weight: 600;
        text-transform: uppercase;
        flex-shrink: 0;
    }

    .notice-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .notice-track {
        display: inline-flex;
        align-items: center;
        white-space: nowrap;
        animation: noticeMove linear infinite;
    }

    .notice-item {
        display: inline-block;
        padding-right: 30px;
        color: #111;
        font-size: 15px;
        font-weight: 500;
    }

    .notice-item::before {
        content: "➤";
        margin-right: 8px;
    }

    /* smooth continuous loop */
    @keyframes noticeMove {
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

<div class="notice-section mt-5">
    <div class="container">

        <div class="notice-bar shadow-sm">

            <div class="notice-label">
                Notice
            </div>

            <div class="notice-wrapper">

                <div class="notice-track">

                    <!-- FIRST SET -->
                    @foreach ($notices as $item)
                        <span class="notice-item">
                            {!! $item->title !!}
                        </span>
                    @endforeach

                    <!-- DUPLICATE SET (IMPORTANT FOR LOOP) -->
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

<script>
    const track = document.querySelector('.notice-track');

    // half width because duplicated content
    const contentWidth = track.scrollWidth / 2;

    // speed control (bigger = slower)
    let duration = contentWidth / 80;

    // minimum smooth speed
    duration = Math.max(duration, 50);

    track.style.animationDuration = `${duration}s`;
</script>
