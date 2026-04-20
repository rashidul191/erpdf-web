<x-admin-app-layout :title="__('Edit FAQ')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit FAQ') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.faq.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')

        <div class="w-full ">
            <!-- question -->
            <x-labeled-input name="question" value="{{ old('question', $faq->question) }}" required
                class="w-full p-1" />

            <!--  Descriptions -->
            <x-labeled-textarea label="Answer" name="answer" :value="old('answer', $faq->answer)" required
                is-editor="is-editor" class="w-full p-1" />
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
