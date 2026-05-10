<x-admin-app-layout :title="__('Create Document')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Document') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.document.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.document.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4">
        @csrf

        <div>
            {{-- <img width="50" id="prevImage" src=""> --}}
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="File" type="file" name="file" class="w-full p-1 md:w-1/2" required
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                <x-labeled-select label="Select Document Category" name="document_category_id" required class="w-full md:w-1/2 p-1">
                    <option value="" disabled selected>
                        Select Document Category
                    </option>

                    @foreach ($documentCategories as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </x-labeled-select>
                <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ \App\Enums\CommonStatus::Active()->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach
                </x-labeled-select>
                <x-labeled-input name="name" required class="w-full p-1 md:w-1/2 lg:w-1/2" />
                <x-labeled-input name="serial" type="number" min="1" class="w-full p-1 md:w-1/2" />


                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </div>

    </form>
</x-admin-app-layout>
