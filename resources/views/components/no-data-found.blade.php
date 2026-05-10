<div class="d-flex align-items-center justify-content-center my-5">
    <div class="text-center my-md-5">

        <!-- Icon -->
        <div class="mb-4">
            <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:90px;height:90px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#dc3545" viewBox="0 0 16 16">
                    <path d="M8 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1zm0 3a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 1 0v-4A.5.5 0 0 0 8 4zm0 7a.75.75 0 1 0 0 1.5A.75.75 0 0 0 8 11z" />
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h4 class="fw-bold mb-2 text-danger">No Data Found</h4>

        <!-- Description -->
        <p class="text-muted mb-4">
            We couldn't find any records matching your request.
        </p>

        <!-- Action Button -->
        <a href="{{ route('home.index') }}" class="btn btn-success px-4">
            Back To Home
        </a>

    </div>
</div>