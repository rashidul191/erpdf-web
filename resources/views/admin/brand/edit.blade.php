<x-admin-app-layout :title="__('Edit Brand')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Brand') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.brands.index') }}">{{ __('Back') }}</a>
        </div>
    </div>
    <div class="bg-white p-4 rounded">
        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <img width="50" id="prevImage" src="{{ $brand->image }}">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image"
                    class="w-full p-1 md:w-1/2" oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                <x-labeled-input name="name" value="{{ $brand->name }}" class="w-full p-1 md:w-1/2" />

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>


        </form>
    </div>
</x-admin-app-layout>
