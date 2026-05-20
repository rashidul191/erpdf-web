<x-admin-app-layout :title="__('Create Testimonial')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Testimonial') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.testimonial.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-white p-4">
            <img width="50" id="prevImage" src="">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="Image (240x240px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1 " required
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                <x-labeled-input name="name" required class="w-full md:w-1/2 p-1 " />
                <x-labeled-input name="designation" class="w-full md:w-1/2 p-1 " />
                <x-labeled-textarea label="Review Text" name="review_text" is-editor="is-editor" class="w-full p-1" />
                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </div>

    </form>
</x-admin-app-layout>
