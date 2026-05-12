<x-admin-app-layout :title="__('Edit News')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit News') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.blog.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')

        <!-- Submit -->
        <div class="w-full flex justify-end">
            <x-button>{{ __('Update') }}</x-button>
        </div>

        <div class="w-full md:flex items-start justify-between md:space-x-4">
            <div class="w-full md:w-2/3">

                <!-- Blog Name -->
                <x-labeled-input name="name" value="{{ old('name', $blog->name) }}" required class="w-full p-1"
                    input-class="bg-transparent border border-gray-300 text-gray-800" />

                <!-- Description -->
                <x-labeled-textarea label="Description" name="description" is-editor="is-editor"
                    :value="old('description', $blog->description)"></x-labeled-textarea>

            </div>

            <div class="w-full md:w-1/3">

                {{-- Main Image Preview --}}
                <img id="prevImage" src="{{ asset($blog->image) }}" class="w-20 h-20 object-cover border rounded mb-2">

                <!-- Main Image Upload -->
                <x-labeled-input type="file" accept="image/*" label="Image(800x800px)" name="image" class="w-full p-1"
                    input-class="border border-gray-300"
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />


                {{-- Main Image Preview --}}
                <img id="prevBannerImage" src="{{ asset($blog->banner_image) }}"
                    class="w-20 h-20 object-cover border rounded mb-2">

                <!-- Main Image Upload -->
                <x-labeled-input type="file" accept="image/*" label="Page Banner Image (1400x350px)" name="banner_image"
                    class="w-full p-1" input-class="border border-gray-300"
                    oninput="prevBannerImage.src=window.URL.createObjectURL(this.files[0])" />

                {{-- <div class="mt-4">
                    <label class="font-semibold">Gallery Images</label>
                    <input type="file" id="gallery_image_input" name="gallery_image_new[]" multiple accept="image/*"
                        class="w-full border-2 border-gray-400 rounded p-2">

                    <div class="flex flex-wrap gap-2 mt-2" id="gallery_preview">
                        @foreach ($blog->gallery_image as $image)
                        <div class="relative w-16 h-16 border rounded overflow-hidden">
                            <img src="{{ asset($image) }}" class="w-full h-full object-cover">
                            <input type="hidden" name="gallery_image[]" value="{{ $image }}">

                            <button type="button"
                                class="absolute inset-0 bg-black/60 text-white flex items-center justify-center opacity-0 hover:opacity-100"
                                onclick="removeOldImage(this)">
                                ✕
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div> --}}


                <!-- Category -->
                <div class="w-full p-1 mt-4">
                    <label class="font-semibold">Select Category</label>
                    <select name="blog_category_id" class="w-full rounded border-gray-300">
                        @foreach ($blogCategories as $item)
                            <option value="{{ $item->id }}" {{ $blog->blog_category_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Short Description -->
                <x-labeled-textarea label="Short Description" name="short_description" :value="old('short_description', $blog->short_description)" />
            </div>
        </div>

        <div class="w-full pt-4 flex justify-end">
            <x-button>{{ __('Update') }}</x-button>
        </div>

    </form>

    {{-- SCRIPT --}}
    <x-slot name="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Gallery Image Preview & Remove JS Code -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const galleryInput = document.getElementById('gallery_image_input');
                const preview = document.getElementById('gallery_preview');
                let selectedFiles = [];

                // New images preview
                galleryInput.addEventListener('change', function (e) {
                    Array.from(e.target.files).forEach(file => {
                        if (!file.type.startsWith('image/')) return;

                        selectedFiles.push(file);

                        const reader = new FileReader();
                        reader.onload = e => {
                            const div = document.createElement('div');
                            div.className = 'relative w-16 h-16 border rounded overflow-hidden';

                            div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <button type="button"
                        class="absolute inset-0 bg-black/60 text-white flex items-center justify-center opacity-0 hover:opacity-100">
                        ✕
                    </button>
                `;

                            // Remove new image
                            div.querySelector('button').onclick = () => {
                                selectedFiles = selectedFiles.filter(f => f !== file);
                                updateInput();
                                div.remove();
                            };

                            preview.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    });

                    updateInput();
                });

                function updateInput() {
                    const dt = new DataTransfer();
                    selectedFiles.forEach(f => dt.items.add(f));
                    galleryInput.files = dt.files;
                }
            });

            // Remove old image
            function removeOldImage(btn) {
                const div = btn.closest('div');
                const input = div.querySelector('input[type="hidden"]'); // remove hidden input
                if (input) input.remove();
                div.remove();
            }
        </script>

    </x-slot>

</x-admin-app-layout>
