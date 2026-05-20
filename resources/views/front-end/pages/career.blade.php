<x-guest-layout>

    <!-- INNER PAGE BANNER -->
    <x-page-banner :image="business_image('career_banner') ?? null" />
    <!-- INNER PAGE BANNER END -->

    <!-- career Page Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4 fw-bold">Application Form</h3>
                        <form method="POST" action="{{ route('career-form.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                        required>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone *</label>
                                    <input type="text" name="phone" class="form-control" placeholder="01XXXXXXXXX"
                                        required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="example@mail.com">
                                </div>

                                <!-- Birth Date -->
                                <div class="col-md-6">
                                    <label class="form-label">Birth Date *</label>
                                    <input type="date" name="birth_date" class="form-control" required>
                                </div>

                                <!-- Education -->
                                <div class="col-md-6">
                                    <label class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control"
                                        placeholder="Your education">
                                </div>

                                <!-- Occupation -->
                                <div class="col-md-6">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" name="occupation" class="form-control"
                                        placeholder="Your occupation">
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <label class="form-label">Address *</label>
                                    <textarea name="address" class="form-control" rows="4" placeholder="Full address"
                                        required></textarea>
                                </div>

                                <!-- Image Upload -->
                                <div class="col-12">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <!-- Submit -->
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="theme-btn btn-style-one">
                                        Apply Now
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Blog Detail Section -->


</x-guest-layout>
