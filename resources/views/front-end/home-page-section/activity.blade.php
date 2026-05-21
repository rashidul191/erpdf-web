<style>
    .activity_section {
        padding: 80px 0;
        /* background: linear-gradient(135deg, #f8fafc, #eef2ff); */
    }

    .counter-box {
        position: relative;
        padding: 40px 25px;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(2, 78, 153, 0.1);
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .counter-box::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(2, 78, 153, 0.15), transparent 60%);
        transform: rotate(25deg);
        opacity: 0;
        transition: 0.5s;
    }

    .counter-box:hover::before {
        opacity: 1;
    }

    .counter-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(2, 78, 153, 0.15);
        border-color: #024e99;
    }

    .counter-number {
        font-size: 42px;
        font-weight: 800;
        color: #024e99;
        margin-bottom: 10px;
    }

    .counter-box h5 {
        font-size: 20px;
        color: #000;
        font-weight: 500;
        letter-spacing: 0.3px;
    }
</style>

<div class="activity_section">
    <div class="container">

        <div class="row text-center">

            @foreach ($activities as $item)
                <div class="col-12 col-md-6 col-lg-3 mb-4">

                    <div class="counter-box">

                        <h2 class="counter-number fw-bold" data-count="{{ $item->count }}">
                            0
                        </h2>

                        <h5 class="mb-0">
                            {{ $item->name }}
                        </h5>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const counters = document.querySelectorAll(".counter-number");

        const speed = 50;

        counters.forEach(counter => {
            const animate = () => {
                const value = +counter.getAttribute("data-count");
                const data = +counter.innerText;

                const increment = Math.ceil(value / speed);

                if (data < value) {
                    counter.innerText = data + increment;
                    setTimeout(animate, 30);
                } else {
                    counter.innerText = value;
                }
            };

            animate();
        });

    });
</script>
