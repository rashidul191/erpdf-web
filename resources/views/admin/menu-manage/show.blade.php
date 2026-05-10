<x-admin-app-layout>

    <div class="w-full flex justify-between items-center mb-4">

        <div class="text-md md:text-2xl">{{ __('Menu Manage') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.menu-manage.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="flex flex-wrap gap-4">

        <!-- LEFT SIDEBAR -->
        <div class="w-full md:w-1/3 p-2">
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold mb-3">Menu Groups</h3>

                <ul class="space-y-2">
                    @foreach ($menuManages as $item)
                        <li class="flex justify-between items-center">
                            <a href="{{ route('admin.menu-manage.show', $item->id) }}"
                                class="flex-1 px-3 py-2 rounded-md text-sm font-medium transition hover:bg-blue-500 hover:text-white {{ $item->id == $menuMange->id ? 'bg-blue-500 text-white' : ''}}">
                                {{ $item->name }}
                            </a>

                            <a href=" {{ route('admin.menu-manage.index', ['id' => $item->id]) }}"
                                class="text-xs text-blue-500 hover:underline ml-2">
                                Edit
                            </a>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- RIGHT CONTENT -->
        <div class="w-full md:w-2/3 p-2 space-y-4">

            <!-- ADD MENU ITEM -->
            <div class="bg-white p-4 rounded shadow mb-3">
                <h3 class="text-lg font-semibold mb-3">
                    Selected Menu Section: <span class="text-blue-600">{{ $menuMange->name }}</span>
                </h3>

                <form action="{{ route('admin.dynamic-menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div x-data="{ isCustom: false }" class="flex flex-wrap justify-center w-full">

                        <input type="hidden" name="menu_manage_id" value="{{ $menuMange->id }}">

                        <!-- Checkbox -->
                        <div class="w-full flex items-center space-x-4 p-2">
                            <input type="checkbox" id="is_custom" name="is_custom" x-model="isCustom"
                                value="{{ \App\Enums\IsAgreeStatus::Yes }}">
                            <label for="is_custom" class="text-lg font-semibold">Is Custom</label>
                        </div>

                        <!-- If NOT custom -->
                        <div class="w-full" x-show="!isCustom">
                            <x-labeled-select label="Select Menu Name" name="page_id" class="w-full p-1"
                                x-bind:required="!isCustom">
                                <option value="" disabled selected>Select Menu Name</option>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}">
                                        {{ $page->title }}
                                    </option>
                                @endforeach
                            </x-labeled-select>
                        </div>

                        <!-- If custom -->
                        <div class="w-full flex flex-wrap" x-show="isCustom">
                            <x-labeled-input label="Menu Name" name="name" class="w-full p-1 md:w-1/2"
                                x-bind:required="isCustom" />
                            <x-labeled-input label="Menu Slug" name="slug" class="w-full p-1 md:w-1/2" />
                        </div>

                        <!-- Status -->
                        <x-labeled-select name="status" required class="w-full md:w-1/2 p-1">
                            @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                                <option value="{{ $value->value }}" {{ \App\Enums\CommonStatus::Active()->value == $value->value ? 'selected' : '' }}>
                                    {{ $value->key }}
                                </option>
                            @endforeach
                        </x-labeled-select>

                        <!-- Serial -->
                        <x-labeled-input name="serial" type="number" class="w-full p-1 md:w-1/2" />

                        <!-- Submit -->
                        <div class="w-full pt-4 flex justify-end">
                            <x-button>Create</x-button>
                        </div>

                    </div>
                </form>
            </div>

            <!-- MENU LIST -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-3">Menu Items</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 border text-left">#</th>
                                <th class="p-2 border text-left">Menu Name</th>
                                <th class="p-2 border text-left">Serial</th>
                                <th class="p-2 border text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($menuMange->menuItems as $index => $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-2 border">{{ $index + 1 }}</td>
                                    <td class="p-2 border">
                                        @if($item->is_custom == \App\Enums\IsAgreeStatus::Yes())
                                            {{ $item->name ?? '-' }}
                                        @else
                                            {{ $item->page->title ?? '-' }}
                                        @endif
                                    </td>
                                    <td class="p-2 border">
                                        {{ $item->serial ?? '-' }}
                                    </td>
                                    <td class="p-2 border">

                                        <form
                                            action="{{ route('admin.dynamic-menu.destroy', [$menuMange->id, $item->id]) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="text-red-500 hover:underline text-sm">
                                                Delete
                                            </button>

                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-3 text-center text-gray-500">
                                        No menu items found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>

</x-admin-app-layout>
