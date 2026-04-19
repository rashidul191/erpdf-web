<x-admin-app-layout>
    <div class="w-full flex justify-between mb-2">
        <div class="text-xl">{{ __('Menu Manage') }}</div>
    </div>
    <div class="w-full flex flex-wrap p-2">

        <div class="mt-2 w-full md:w-1/3 flex flex-wrap">

            <div class="w-full p-2">
                <div class="bg-white rounded shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">Menu Groups</h3>

                    <ul class="space-y-2">
                        @foreach ($menuManages as $item)
                            <li class="flex justify-between items-center">

                                <a href="{{ route('admin.menu-manage.show', $item->id) }}"
                                    class="flex-1 px-3 py-2 rounded-md text-sm font-medium transition hover:bg-blue-500 hover:text-white">

                                    {{ $item->name }}
                                </a>

                                <a href="{{ route('admin.menu-manage.index', ['id' => $item->id]) }}"
                                    class="text-xs text-blue-500 hover:underline ml-2">
                                    Edit
                                </a>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        @if($menuManages->count() <= 1)
            {{-- Create Form Start --}}
            <div class="w-full md:w-2/3 bg-white p-2 rounded">
                <form action="{{ isset($editMenu)
            ? route('admin.menu-manage.update', $editMenu->id)
            : route('admin.menu-manage.store') }}" method="POST">

                    @csrf

                    @isset($editMenu)
                        @method('PUT')
                    @endisset

                    <div class="flex flex-wrap justify-center w-full">

                        {{-- NAME --}}
                        <x-labeled-input name="name" value="{{ $editMenu->name ?? '' }}" required
                            class="w-full md:w-1/2 p-1" />

                        {{-- SERIAL --}}
                        <x-labeled-input name="serial" type="number" value="{{ $editMenu->serial ?? '' }}"
                            class="w-full md:w-1/2 p-1" />

                        {{-- BUTTON --}}
                        <div class="w-full pt-4 flex justify-end">
                            <x-button>
                                {{ isset($editMenu) ? 'Update' : 'Create' }}
                            </x-button>
                        </div>

                    </div>

                </form>
            </div>
            {{-- Create Form End --}}
        @endif
    </div>

</x-admin-app-layout>
