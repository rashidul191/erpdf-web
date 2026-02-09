<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('About Section') }}</div>
    </div>

    <div class="w-full mt-4 bg-white p-4 rounded">
        <form action="{{ route('admin.business-setting.update') }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf

            <div class="flex flex-wrap items-center w-full">
                <img width="50" height="50" id="preAboutBannerImg" src="{{ business_image('about_page_banner_img') }}">
                <x-labeled-input label="Page Banner Image (1920x800px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="about_page_banner_img"
                    class="w-full md:w-[89%] p-1"
                    onchange="preAboutBannerImg.src=window.URL.createObjectURL(this.files[0])"
                    value="{{ business_setting('about_page_banner_img') }}" />
            </div>

            <div class="flex flex-wrap w-full">
                <x-labeled-input label="Title" name="about_title" type="text"
                    value="{!! business_setting('about_title') !!}" class="w-full md:w-1/2 p-1" />

                <x-labeled-textarea label="Short Description" name="about_description" type="text"
                    value="{!! business_setting('about_description') !!}" class="w-full md:w-1/2 p-1" />
            </div>
            <div class="w-full
                            pt-4 flex justify-end">
                <x-button>
                    {{ __('Update') }}
                </x-button>
            </div>

        </form>
    </div>

    <!-- About Left Side Contents -->
    <div class="bg-white p-3 mt-3 rounded">
        <!-- Title -->
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                About Section – Left Side
            </h3>
            <table>
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="https://via.placeholder.com/50" alt="Image"></td>
                        <td>Sample Title</td>
                        <td>Sample description for the about left side content.</td>
                        <td>
                            <a href="#" class="text-blue-600 hover:underline">Edit</a>
                            <a href="#" class="text-red-600 hover:underline ml-2">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>

    <!-- About Right Side Contents -->
    <div class="bg-white p-3 mt-3 rounded">
        <!-- Title -->
        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            About Section – Right Side
        </h3>

        <div class="w-full md:flex space-x-4">

            <div class="w-full md:w-1/2">
                <form action="{{ route('admin.about.right-side') }}" method="POST" enctype="multipart/form-data" class="w-full">
                    @csrf
                    <div class="bg-white ">
                        <div>
                            <img width="50" height="50" id="preRightImg">
                            <x-labeled-input label="Image (555x740px)" type="file"
                                accept="image/jpeg,image/png,image/jpg,image/webp" name="image"
                                class="w-full p-1"
                                onchange="preRightImg.src=window.URL.createObjectURL(this.files[0])"
                                required />
                        </div>

                        <div class="w-full pt-2">
                            <x-button>
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Image List -->
            <div class=" w-full md:w-1/2 bg-white p-4 rounded">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">SL</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($aboutRightSideImages as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-4 py-3">
                                <img
                                    src="{{ asset($item->image) }}"
                                    class="w-10 h-10 object-cover"
                                    alt="Image">
                            </td>

                            <td class="px-4 py-3 text-center">
                                <form
                                    action="{{ route('admin.about.right-side.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-800 text-white font-medium py-1 px-3 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-6 text-gray-500">
                                No data found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-admin-app-layout>