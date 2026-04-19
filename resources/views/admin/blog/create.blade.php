<x-admin-app-layout :title="__('Create News')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create News') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.blog.index') }}">{{ __('Back') }}</a>
        </div>
    </div>


    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4 rounded shadow">
        @csrf
        <!-- Submit -->
        <div class="w-full flex justify-end">
            <x-button>{{ __('Publish') }}</x-button>
        </div>

        <div class="w-full md:flex items-start justify-between md:space-x-4">
            <div class="w-full md:w-2/3">
                <!-- Blog Name -->
                <x-labeled-input name="name" required class="w-full p-1 "
                    input-class="bg-transparent border border-gray-300 text-gray-800 placeholder-gray-500" />
                <!--  Descriptions -->
                <x-labeled-textarea label="Description" name="description" is-editor="is-editor"
                    class="bg-transparent text-gray-800 placeholder-gray-500" />

            </div>

            <div class="w-full md:w-1/3">
                {{-- Preview Image --}}
                <img width="50" id="prevImage" src="">
                <!-- Main Image Upload -->
                <x-labeled-input type="file" accept="image/*" label="Image(800x800px)" name="image"
                    class="w-full p-1"
                    input-class="bg-transparent border border-gray-300 text-gray-800 placeholder-gray-500"
                    oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" required />

                <!-- Gallery Images Upload -->
                <div>
                    <div>
                        <label for="gallery_image_input" class="font-semibold text-gray-800 mb-2">Gallery Images (800x800px)</label>

                        <input label="Gallery Images (800x800px)" type="file" accept="image/*"
                            name="gallery_image[]" class="w-full bg-transparent border-2 border-gray-400 text-gray-800 rounded-md p-2" id="gallery_image_input"
                            multiple />
                    </div>
                    <!-- <x-labeled-input label="Gallery Images (800x800px)" type="file" accept="image/*"
                    name="gallery_image[]" class="w-full p-1"
                    input-class="bg-transparent border border-gray-300 text-gray-800 placeholder-gray-500" multiple /> -->
                    <div class="flex flex-wrap gap-2 mt-2" id="gallery_preview"></div>
                </div>

                <!-- Category Dropdown -->
                <div class="w-full p-1">
                    <label for="blog_category_id" class="font-semibold">Select Category</label>
                    <select name="blog_category_id" id="blog_category_id" class="select2 w-full rounded border-gray-300">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($blogCategories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('blog_category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Descriptions -->
                <x-labeled-textarea label="Short Description" name="short_description"
                    class="bg-transparent text-gray-800 placeholder-gray-500" />
            </div>
        </div>


        <!-- Submit -->
        <div class="w-full pt-4 flex justify-end">
            <x-button>{{ __('Publish') }}</x-button>
        </div>

    </form>

    <x-slot name="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const galleryInput = document.getElementById('gallery_image_input');
                const previewContainer = document.getElementById('gallery_preview');

                let selectedFiles = [];

                galleryInput.addEventListener('change', function(e) {

                    const newFiles = Array.from(e.target.files);

                    newFiles.forEach(file => {
                        if (!file.type.startsWith('image/')) return;

                        selectedFiles.push(file);

                        const reader = new FileReader();

                        reader.onload = function(event) {

                            const wrapper = document.createElement('div');
                            wrapper.className = 'relative w-16 h-16 border rounded overflow-hidden flex items-center justify-center';

                            const img = document.createElement('img');
                            img.src = event.target.result;
                            img.className = 'w-full h-full object-cover';

                            const closeBtn = document.createElement('button');
                            closeBtn.type = 'button';
                            closeBtn.innerHTML = '✕';
                            closeBtn.className =
                                'absolute inset-0 bg-black/50 text-white text-xl opacity-0 hover:opacity-100 transition flex items-center justify-center';

                            closeBtn.addEventListener('click', function() {
                                const index = selectedFiles.indexOf(file);
                                if (index > -1) {
                                    selectedFiles.splice(index, 1);
                                    updateFileInput();
                                }
                                wrapper.remove();
                            });

                            wrapper.appendChild(img);
                            wrapper.appendChild(closeBtn);
                            previewContainer.appendChild(wrapper);
                        };

                        reader.readAsDataURL(file);
                    });

                    updateFileInput();
                    // galleryInput.value = ''; // VERY IMPORTANT
                });

                function updateFileInput() {
                    const dataTransfer = new DataTransfer();
                    selectedFiles.forEach(file => dataTransfer.items.add(file));
                    galleryInput.files = dataTransfer.files;
                }

            });
        </script>



    </x-slot>

</x-admin-app-layout>
