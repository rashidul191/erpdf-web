<x-admin-app-layout :title="__('Edit Sub Of Sub Menu')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Sub Of Sub Menu') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.sub-of-sub-menu.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="bg-white p-4 rounded">
        <form action="{{ route('admin.sub-of-sub-menu.update', $subOfSubMenu->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap justify-center w-full">

                <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ $subOfSubMenu->status->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach
                </x-labeled-select>

                <x-labeled-input name="serial" value="{{ $subOfSubMenu->serial }}" type="number"
                    class="w-full md:w-1/2 p-1" />


                <x-labeled-select label="Select Sub Menu" name="sub_menu_id" required class="w-full md:w-1/2 p-1">
                    <option value="" disabled>Select Sub Menu</option>
                    @foreach ($subMenus as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $subOfSubMenu->menu_id ? 'selected' : '' }}>
                            {{ $item->page->title }}
                        </option>
                    @endforeach
                </x-labeled-select>

                <x-labeled-select label="Select Sub Of Sub Menu Name" name="page_id" required class="w-full md:w-1/2 p-1">
                    <option value="" disabled selected>Select Sub Of Sub Menu Name</option>
                    @foreach ($pages as $page)
                        <option value="{{$page->id }}" {{ $page->id == $subOfSubMenu->page_id ? 'selected' : '' }}>
                            {{ $page->title }}
                        </option>
                    @endforeach
                </x-labeled-select>


                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
