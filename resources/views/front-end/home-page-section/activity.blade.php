<div class="activity_section">
    <div class="continer">
        <div class="row">
            @foreach ($activities as $item)
                <div class="col-12 col-md-6 col-lg-3">
                    <h3>{{ $item->count }}</h3>
                    <p>{{ $item->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
