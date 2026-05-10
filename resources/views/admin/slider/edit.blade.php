<x-admin-app-layout :title="__('Edit Slider')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Slider') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.slider.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="w-full md:w-2/5 md:pr-3">
        <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white p-4">
                <img width="100" id="prevImage" src="{{ $slider->image }}">
                <div class="w-full">
                    <x-labeled-input label="Image (1600x600)" type="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1"
                        oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />

                    <x-labeled-input name="title" value="{!! $slider->title !!}" class="w-full p-1" />

                    <x-labeled-input label="Page Link" name="page_link"
                        value="{!! $slider->page_link !!}" class="w-full p-1" />

                    <label class="inline-flex items-center mt-2">
                        <input type="checkbox" name="is_home" value="{{ \App\Enums\IsHomeStatus::Yes }}"
                            {{ $slider->is_home->value === \App\Enums\IsHomeStatus::Yes ? 'checked' : '' }}
                            class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <span class="text-gray-700 ml-2">Is Home</span>
                    </label>
                    <div class="w-full pt-4 flex justify-end">
                        <x-button>{{ __('Update') }}</x-button>
                    </div>
                </div>
            </div>

        </form>

    </div>
</x-admin-app-layout>
