<style>
    .notice-bar {
        display: flex;
        align-items: center;
        overflow: hidden;
        background: #fff8cc;
        border-radius: 10px;
        border: 1px solid #eee;
    }

    .notice-label {
        background: #000;
        color: #fff;
        padding: 14px 22px;
        font-size: 15px;
        font-weight: 600;
        text-transform: uppercase;
        flex-shrink: 0;
    }

    .notice-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
    }

    /* ONLY ONE TRACK */
    .notice-track {
        position: absolute;
        white-space: nowrap;
        left: 100%;
    }

    .notice-item {
        display: inline-block;
        padding-right: 80px;
        color: #111;
        font-size: 15px;
        font-weight: 500;
    }

    .notice-item::before {
        content: "➤";
        margin-right: 8px;
    }

    @keyframes noticeMove {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(calc(-100% - 100vw));
        }
    }

    .notice-wrapper:hover .notice-track {
        animation-play-state: paused;
    }
</style>

<div class="notice-section mt-4">
    <div class="container">

        <div class="notice-bar shadow-sm">

            <div class="notice-label">
                Notice
            </div>

            <div class="notice-wrapper">

                <!-- SINGLE TRACK -->
                <div class="notice-track">

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

    const textWidth = track.offsetWidth;

    /*
        Smart smooth speed
        small text not too fast
        large text auto slower
    */

    let duration = (textWidth + window.innerWidth) / 120;

    duration = Math.max(duration, 50);

    track.style.animation =
        `noticeMove ${duration}s linear infinite`;
</script>
