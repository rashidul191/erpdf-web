<x-admin-app-layout :title="__('Creatre Menu')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Menu') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.menu.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    {{-- Create Form Start --}}
    <div class="bg-white p-2 rounded">
        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap justify-center w-full">

                <x-labeled-select label="Select Menu Name" name="page_id" required class="w-full p-1">
                    <option value="" disabled selected>Select Menu Name</option>
                    @foreach ($pages as $page)
                        <option value="{{$page->id }}">
                            {{ $page->title }}
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



                <x-labeled-input name="serial" type="number" class="w-full p-1 md:w-1/2" />

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </form>
    </div>
    {{-- Create Form End --}}
</x-admin-app-layout>
