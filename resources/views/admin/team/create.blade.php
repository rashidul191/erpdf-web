<x-admin-app-layout :title="__('Create Team')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Team') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.team.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4">
        @csrf
        <div class="mb-4">
            <h2 class="font-semibold text-lg">Select Team Category</h2>

            <div style="display:flex; flex-wrap:wrap; gap:10px; margin-top:10px;">
                @foreach ($teamCategories as $item)
                    <label style="display:flex; align-items:center; gap:5px; cursor:pointer;">

                        <input type="checkbox" name="team_category_id[]" value="{{ $item->id }}" {{ in_array($item->id, old('team_category_id', [])) ? 'checked' : '' }}>

                        <span class="font-semibold text-md">{{ $item->name }}</span>
                    </label>
                @endforeach
            </div>

        </div>
        <div>
            <img width="50" id="prevImage" src="">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="Image (220x250px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1 md:w-1/3" required
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />

                <x-labeled-select name="status" required class="w-full md:w-1/3 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ \App\Enums\CommonStatus::Active()->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach
                </x-labeled-select>

                <x-labeled-input name="serial" type="number" min="1" class="w-full p-1 md:w-1/3" />
                <x-labeled-input name="name" required class="w-full p-1 md:w-1/2 lg:w-1/3" />
                <x-labeled-input name="designation" required class="w-full p-1 md:w-1/2 lg:w-1/3" />
                <x-labeled-input name="fb_link" class="w-full p-1 md:w-1/2 lg:w-1/3" />
                <x-labeled-input name="linkedin_link" class="w-full p-1 md:w-1/2 lg:w-1/3" />
                {{-- <x-labeled-input name="twitter_link" class="w-full p-1 md:w-1/2 lg:w-1/3" /> --}}
                <x-labeled-input name="instagram_link" class="w-full p-1 md:w-1/2 lg:w-1/3" />

                <x-labeled-textarea label="Description" name="description" is-editor="is-editor"
                    :value="old('description')" class="w-full p-1"></x-labeled-textarea>


                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </div>

    </form>
</x-admin-app-layout>
