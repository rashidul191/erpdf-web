<x-admin-app-layout :title="__('Edit Content')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Content') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.page.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="bg-white p-4 rounded">
        <form action="{{ route('admin.page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Update') }}</x-button>
            </div>
            <div class="w-full flex flex-wrap">
                <div class="w-full md:w-2/3 p-1">
                    <x-labeled-input name="title" value="{{ old('title', $page->title) }}" required
                        class="w-full p-1" />
                    <x-labeled-textarea label="Short Description" name="short_description" is-editor="is-editor"
                        :value="old('short_description', $page->short_description)"
                        class="w-full p-1"></x-labeled-textarea>
                    <x-labeled-textarea label="Description" name="description" is-editor="is-editor"
                        :value="old('description', $page->description)" class="w-full p-1"></x-labeled-textarea>
                </div>

                <div class="w-full md:w-1/3 p-1">
                    <x-labeled-select name="status" required class="w-full p-1">
                        @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                            <option value="{{ $value->value }}" {{ $page->status->value == $value->value ? 'selected' : '' }}>
                                {{ $value->key }}
                            </option>
                        @endforeach
                    </x-labeled-select>

                    <div class="w-full p-1">
                        <img width="50" id="prevBannerImage" src="{{ asset($page->page_banner_image) }}">
                        <x-labeled-input label="Page Banner Image (1400x350px)" type="file"
                            accept="image/jpeg,image/png,image/jpg,image/webp" name="page_banner_image"
                            class="w-full p-1"
                            oninput="prevBannerImage.src=window.URL.createObjectURL(this.files[0])" />
                    </div>
                    <div class="w-full p-1">
                        <img width="50" id="prevImage" src="{{ asset($page->image) }}">
                        <x-labeled-input label="Image (1200x400px)" type="file"
                            accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1"
                            oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                    </div>
                    <x-labeled-textarea label="Others" name="others" :value="old('others', $page->others)"
                        class="w-full p-1"></x-labeled-textarea>
                    <x-labeled-select name="page_layout_type" required class="w-full p-1">
                        @foreach (\App\Enums\PageLayoutType::getInstances() as $value)
                            <option value="{{ $value->value }}" {{ $page->page_layout_type->value == $value->value ? 'selected' : '' }}>
                                {{ $value->description }}
                            </option>
                        @endforeach
                    </x-labeled-select>
                </div>
            </div>

            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Update') }}</x-button>
            </div>
        </form>
    </div>
</x-admin-app-layout>
