<x-admin-app-layout :title="__('Create Tag')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Tag') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.tag.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.tag.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-white p-4">
            <img width="50" id="prevImage" src="">
            <div class="w-full flex">
                <x-labeled-select name="is_home" class="w-full p-1 md:w-1/2">
                    @foreach (\App\Enums\IsHomeStatus::toSelectArray() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-labeled-select>
                <x-labeled-input name="name" label="Display Name" required class="w-full p-1 md:w-1/2" />
                <x-labeled-input name="position" type="number" min="1" class="w-full p-1 md:w-1/2" />
            </div>
            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Create') }}</x-button>
            </div>
        </div>

    </form>
</x-admin-app-layout>
