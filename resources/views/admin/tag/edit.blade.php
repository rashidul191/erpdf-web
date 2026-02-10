<x-admin-app-layout :title="__('Edit Tag')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Tag') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.tag.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white p-4">

            <div class="w-full flex flex-wrap">
                {{-- is_home select --}}
                <x-labeled-select name="is_home" label="Show on Home" class="w-full p-1 md:w-1/2">
                    @foreach (\App\Enums\IsHomeStatus::toSelectArray() as $key => $value)
                        <option value="{{ $key }}" {{ $tag->is_home->value == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </x-labeled-select>
                {{-- name input --}}
                <x-labeled-input name="name" label="Display Name" required value="{{ old('name', $tag->name) }}"
                    class="w-full p-1 md:w-1/2" />

                {{-- position input --}}
                <x-labeled-input name="position" type="number" min="1"
                    value="{{ old('position', $tag->position) }}" class="w-full p-1 md:w-1/2" />
            </div>

            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Update') }}</x-button>
            </div>
        </div>
    </form>
</x-admin-app-layout>
