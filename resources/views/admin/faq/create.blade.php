<x-admin-app-layout :title="__('Create FAQ')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create FAQ') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.faq.index') }}">{{ __('Back') }}</a>
        </div>
    </div>


    <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4 rounded shadow">
        @csrf

        <div class="w-full ">
            <!-- question -->
            <x-labeled-input name="question" value="{{ old('question') }}" required class="w-full p-1" />

            <!--  Descriptions -->
            <x-labeled-textarea label="Answer" name="answer" required is-editor="is-editor" class="w-full p-1" />
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
            document.addEventListener('DOMContentLoaded', function () {

                const galleryInput = document.getElementById('gallery_image_input');
                const previewContainer = document.getElementById('gallery_preview');

                let selectedFiles = [];

                galleryInput.addEventListener('change', function (e) {

                    const newFiles = Array.from(e.target.files);

                    newFiles.forEach(file => {
                        if (!file.type.startsWith('image/')) return;

                        selectedFiles.push(file);

                        const reader = new FileReader();

                        reader.onload = function (event) {

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

                            closeBtn.addEventListener('click', function () {
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
