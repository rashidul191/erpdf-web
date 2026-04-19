<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Edit About Left Section') }}</div>
    </div>

    <!-- About Left Side Contents -->
    <div class="bg-white p-3 mt-3 rounded">
        <div class="w-full md:w-1/2">
            <form action="{{ route('admin.about.left-side.update', $aboutLeftContent->id) }}" method="POST"
                enctype="multipart/form-data" class="w-full">
                @csrf
                <div class="bg-white ">
                    <div>
                        <img width="50" height="50" id="preLeftImg" src="{{ asset($aboutLeftContent->image) }}">
                        <x-labeled-input label="Image (100x100px)" type="file"
                            accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full p-1"
                            onchange="preLeftImg.src=window.URL.createObjectURL(this.files[0])" />
                    </div>

                    <div class="flex flex-wrap w-full">
                        <x-labeled-input name="title" type="text" value="{{ $aboutLeftContent->title }}" required
                            class="w-full p-1" />
                        <x-labeled-input name="short_description" type="text"
                            value="{!! $aboutLeftContent->short_description !!}" class="w-full p-1" />
                    </div>

                    <div class="w-full pt-2">
                        <x-button>
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-admin-app-layout>
