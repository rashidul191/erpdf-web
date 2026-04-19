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

            <div x-data="{
            isCustom: {{ $menu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? 'true' : 'false' }}
        }" class="flex flex-wrap justify-center w-full">

                <!-- Checkbox -->
                <div class="w-full flex items-center space-x-4 p-2">
                    <input type="checkbox" id="is_custom" name="is_custom" value="{{ \App\Enums\IsAgreeStatus::Yes }}"
                        x-model="isCustom" {{ $menu->is_custom == \App\Enums\IsAgreeStatus::Yes() ? 'checked' : '' }}>

                    <label for="is_custom" class="text-lg font-semibold">Is Custom</label>
                </div>

                <!-- If NOT custom -->
                <div class="w-full" x-show="!isCustom">
                    <x-labeled-select label="Select Menu Name" name="page_id" class="w-full p-1"
                        x-bind:required="!isCustom">

                        <option value="" disabled>Select Menu Name</option>

                        @foreach ($pages as $page)
                            <option value="{{ $page->id }}" {{ $page->id == $menu->page_id ? 'selected' : '' }}>
                                {{ $page->title }}
                            </option>
                        @endforeach

                    </x-labeled-select>
                </div>

                <!-- If custom -->
                <div class="w-full flex flex-wrap" x-show="isCustom">

                    <x-labeled-input label="Menu Name" name="name" class="w-full p-1 md:w-1/2"
                        x-bind:required="isCustom" value="{{ $menu->name }}" />

                    <x-labeled-input label="Menu Slug" name="slug" class="w-full p-1 md:w-1/2"
                        value="{{ $menu->slug }}" />

                </div>

                <!-- Status -->
                <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">

                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ $menu->status->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach

                </x-labeled-select>

                <!-- Serial -->
                <x-labeled-input name="serial" type="number" class="w-full p-1 md:w-1/2" value="{{ $menu->serial }}" />

                <!-- Submit -->
                <div class="w-full pt-4 flex justify-end">
                    <x-button>Update</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
