<x-admin-app-layout :title="__('Creatre Page')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Page') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.page.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    {{-- Create Form Start --}}
    <div class="bg-white p-2 rounded">
        <form action="{{ route('admin.page.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap justify-center w-full">

                <div class="w-full md:w-1/2 p-1">
                    <img width="50" id="prevImage" src="">
                    <x-labeled-input label="Image (500x720px)" type="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1"
                        oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                </div>

                <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ \App\Enums\CommonStatus::Active()->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach
                </x-labeled-select>

                <x-labeled-input name="title" value="{{ old('title') }}" required class="w-full p-1" />


                <x-labeled-textarea label="Short Description" name="short_description" is-editor="is-editor"
                    :value="old('short_description')" class="w-full p-1"></x-labeled-textarea>

                <x-labeled-textarea label="Description" name="description" is-editor="is-editor"
                    :value="old('description')" class="w-full p-1"></x-labeled-textarea>

                <x-labeled-textarea label="Others" name="others" :value="old('others')"
                    class="w-full p-1"></x-labeled-textarea>

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </form>
    </div>
    {{-- Create Form End --}}
</x-admin-app-layout>
