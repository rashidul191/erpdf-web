<x-admin-app-layout :title="__('Edit Document')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Document') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.document.index') }}">
                {{ __('Back') }}
            </a>
        </div>
    </div>

    <form action="{{ route('admin.document.update', $document->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4">
        @csrf
        @method('PUT')
        @if($document->file)
            <iframe src="{{ $document->file }}" width="120px" height="120px"></iframe>
        @endif
        <div class="flex flex-wrap w-full">

            <x-labeled-input label="File" type="file" name="file" class="w-full md:w-1/2 mt-2"
                oninput="prevFile.src=window.URL.createObjectURL(this.files[0])" />
            {{-- Category --}}
            <x-labeled-select name="document_category_id" required class="w-full md:w-1/2 p-1">
                <option value="" disabled>Select Document Category</option>

                @foreach ($documentCategories as $item)
                    <option value="{{ $item->id }}" {{ $document->document_category_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </x-labeled-select>

            {{-- Status --}}
            <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                    <option value="{{ $value->value }}" {{ $document->status->value == $value->value ? 'selected' : '' }}>
                        {{ $value->key }}
                    </option>
                @endforeach
            </x-labeled-select>

            {{-- Name --}}
            <x-labeled-input name="name" value="{{ $document->name }}" required class="w-full md:w-1/2 p-1" />

            {{-- Serial --}}
            <x-labeled-input name="serial" type="number" min="1" value="{{ $document->serial }}"
                class="w-full md:w-1/2 p-1" />

            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Update') }}</x-button>
            </div>

        </div>
    </form>

</x-admin-app-layout>
