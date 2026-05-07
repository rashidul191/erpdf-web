<div class="sponsors-section">
    <div class="auto-container">

        <div class="carousel-outer">
            <!--Sponsors Slider-->
            <ul class="sponsors-carousel owl-carousel owl-theme">

                @foreach ($clientLogos as $item)
                <li>
                    <div class="image-box">
                        <a href="{{ $item->link }}">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}"></a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>