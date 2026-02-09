<x-admin-app-layout :title="__('Edit Client Review')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Client Review') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.client-say.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.client-say.update', $clientSay->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white p-4">
            <img width="50" id="prevImage" src="{{ $clientSay->image }}">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="Image (240x240px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="image"
                    class="w-full p-1 md:w-1/2 lg:w-1/3"
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />              
                <x-labeled-input name="name" value="{{ $clientSay->name }}" class="w-full p-1 md:w-1/2 lg:w-1/3" />
                <x-labeled-input name="address" value="{{ $clientSay->address }}" class="w-full p-1 md:w-1/2 lg:w-1/3" />
                <x-labeled-textarea label="Description" name="description" value="{{ $clientSay->description }}" class="w-full p-1 md:w-1/2 lg:w-1/3" />
              
                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>
        </div>

    </form>
</x-admin-app-layout>