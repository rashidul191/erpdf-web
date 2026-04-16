<x-admin-app-layout :title="__('Create Our Service')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Our Service') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.services.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-white p-4">
            <img width="50" id="prevImage" src="">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="Image (100x100px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full md:w-1/2 p-1" required
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                <x-labeled-input name="title" required class="w-full md:w-1/2 p-1" />
                {{-- <x-labeled-input name="sub_title" class="w-full p-1" /> --}}

                <x-labeled-textarea label="Short Description" name="short_description" is-editor="is-editor"
                    :value="old('short_description')" class="w-full p-1"></x-labeled-textarea>

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </div>

    </form>
</x-admin-app-layout>
