<x-admin-app-layout :title="__('Edit Document')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Document') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.document.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.document.update', $team->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <h2 class="font-semibold text-lg">Select Team Category</h2>

            <div style="display:flex; flex-wrap:wrap; gap:10px; margin-top:10px;">
                @foreach ($teamCategories as $item)

                    <label style="display:flex; align-items:center; gap:5px; cursor:pointer;">

                        <input type="checkbox" name="team_category_id[]" value="{{ $item->id }}"   {{ $selectedCategories->contains($item->id) ? 'checked' : '' }}>

                        <span class="font-semibold text-md">{{ $item->name }}</span>
                    </label>
                @endforeach
            </div>

        </div>



        <div class="">
            <img width="50" id="prevImage" src="{{ $team->image }}">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="Image (220x250px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1 md:w-1/2 lg:w-1/3"
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />

                <x-labeled-select name="status" required class="w-full md:w-1/2 lg:w-1/3 p-1">
                    @foreach (\App\Enums\CommonStatus::getInstances() as $value)
                        <option value="{{ $value->value }}" {{ $team->status->value == $value->value ? 'selected' : '' }}>
                            {{ $value->key }}
                        </option>
                    @endforeach
                </x-labeled-select>



                <x-labeled-input name="serial" type="number" min="1" value="{{ $team->serial }}"
                    class="w-full p-1 md:w-1/2 lg:w-1/3" />


                <x-labeled-input name="name" value="{{ $team->name }}" required class="w-full p-1 md:w-1/3" />
                <x-labeled-input name="designation" value="{{ $team->designation }}"
                    class="w-full p-1 md:w-1/2 lg:w-1/3" />

                <x-labeled-input name="fb_link" value="{{ $team->fb_link }}" class="w-full p-1 md:w-1/2 lg:w-1/3" />

                <x-labeled-input name="linkedin_link" value="{{ $team->linkedin_link }}"
                    class="w-full p-1 md:w-1/2 lg:w-1/3" />

                {{-- <x-labeled-input name="twitter_link" value="{{ $team->twitter_link }}"
                    class="w-full p-1 md:w-1/2 lg:w-1/3" /> --}}

                <x-labeled-input name="instagram_link" value="{{ $team->instagram_link }}"
                    class="w-full p-1 md:w-1/2 lg:w-1/3" />


                {{-- <x-labeled-textarea label="Description" name="description" is-editor="is-editor"
                    :value="old('description', $team->description)" class="w-full p-1"></x-labeled-textarea> --}}


                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>
        </div>

    </form>
</x-admin-app-layout>
