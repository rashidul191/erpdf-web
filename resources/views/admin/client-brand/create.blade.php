<x-admin-app-layout :title="__('Create Client Brand')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Client Brand') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.client-brand.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="w-full bg-white rounded p-3 mt-3">
        <form action="{{ route('admin.client-brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <img width="50" id="prevImage" src="">

            <div class="w-full md:flex flex-wrap">
                <x-labeled-input label="Image (310x120px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="image"
                    class="w-full p-1" required
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />

                <x-labeled-input name="title" class="w-full md:w-1/2 p-1" />
                <x-labeled-input name="link" class="w-full md:w-1/2 p-1" />
            </div>

            <div class="w-full pt-2 flex justify-end">
                <x-button> {{ __('Create') }}</x-button>
            </div>
        </form>
    </div>
</x-admin-app-layout>