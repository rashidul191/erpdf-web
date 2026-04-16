<x-admin-app-layout :title="__('Edit Menu')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Menu') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.menu.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="bg-white p-4 rounded">
        <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap justify-center w-full">

                <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ $menu->status->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach
                </x-labeled-select>

                <x-labeled-input name="serial" value="{{ $menu->serial }}" type="number" class="w-full md:w-1/2 p-1" />
                <x-labeled-input name="name" value="{{ $menu->name }}" required class="w-full p-1" />



                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
