<x-admin-app-layout :title="__('Edit Our Service')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Our Service') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.services.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white p-4">
            <img width="50" id="prevImage" src="{{ $service->image }}">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="Image (3500x250px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1"
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />

                <x-labeled-input type="number" name="serial" value="{!! $service->serial !!}"
                    class="w-full md:w-1/2 p-1" />
                <x-labeled-input name="title" value="{!! $service->title !!}" class="w-full p-1 md:w-1/2" />
                {{-- <x-labeled-input name="sub_title" value="{{ $service->sub_title }}" class="w-full p-1 md:w-1/2" />
                --}}

                <x-labeled-textarea label="Short Description" name="short_description" is-editor="is-editor"
                    :value="old('short_description', $service->short_description)"
                    class="w-full p-1"></x-labeled-textarea>


                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>
        </div>

    </form>
</x-admin-app-layout>
