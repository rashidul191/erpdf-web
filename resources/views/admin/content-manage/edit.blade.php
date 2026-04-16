<x-admin-app-layout :title="__('Edit Content')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Content') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.content-manage.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="bg-white p-4 rounded">
        <form action="{{ route('admin.content-manage.update', $contentManage->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <div class="flex flex-wrap justify-center w-full">

                <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                    <option value="{{ $value->value }}" {{ $contentManage->status->value == $value->value ? 'selected' :
                        '' }}>
                        {{ $value->key }}
                    </option>
                    @endforeach
                </x-labeled-select>


                <x-labeled-input name="title" value="{{ $contentManage->title }}" required class="w-full p-1" />



                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div> --}}


            <div class="flex flex-wrap justify-center w-full">

                <div class="w-full">
                    <img width="50" id="prevImage" src="{{ asset($contentManage->image) }}">
                    <x-labeled-input label="Image (500x720px)" type="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1"
                        oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                </div>

                <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ $contentManage->status->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach
                </x-labeled-select>

                <x-labeled-select label="Select Menu" name="menu_id" required class="w-full md:w-1/2 p-1">

                    <option value="" disabled {{ old('menu_id', $contentManage->menu_id ?? '') == '' ? 'selected' : '' }}>
                        Select Menu
                    </option>

                    @foreach ($menus as $item)
                        <option value="{{ $item->id }}" {{ old('menu_id', $contentManage->menu_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach

                </x-labeled-select>

                <x-labeled-input name="title" value="{{ old('title', $contentManage->title) }}" required
                    class="w-full p-1" />


                <x-labeled-textarea label="Short Description" name="short_description" is-editor="is-editor"
                    :value="old('short_description', $contentManage->short_description)"
                    class="w-full p-1"></x-labeled-textarea>

                <x-labeled-textarea label="Description" name="description" is-editor="is-editor"
                    :value="old('description', $contentManage->description)" class="w-full p-1"></x-labeled-textarea>

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
