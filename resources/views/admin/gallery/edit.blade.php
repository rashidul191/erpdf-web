<x-admin-app-layout :title="__('Edit Gallery')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Gallery') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.gallery.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="bg-white p-4 rounded">
        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img width="50" id="prevImage" src="{{ $gallery->image }}">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image"
                    class="w-full p-1" oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                <x-labeled-input name="title" value="{{ $gallery->title }}" class="w-full p-1" />

                <x-labeled-input type="number" name="serial" value="{{ $gallery->serial }}" class="w-full p-1" />

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
