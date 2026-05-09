<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Galleries') }}</div>

        <div>
            <a href="{{ route('admin.gallery.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create Gallery') }}
            </a>
        </div>
    </div>

    <div class="w-full mt-4 bg-white p-4 rounded">
        <form action="{{ route('admin.business-setting.update') }}" method="POST" enctype="multipart/form-data"
            class="w-full">
            @csrf
            <img width="50" height="50" id="preGalleryBannerImg" src="{{ business_image('gallery_page_banner_img') }}">
            <x-labeled-input label="Page Banner Image (1400x350px)" type="file"
                accept="image/jpeg,image/png,image/jpg,image/webp" name="gallery_page_banner_img" class="w-full p-1"
                onchange="preGalleryBannerImg.src=window.URL.createObjectURL(this.files[0])"
                value="{{ business_setting('gallery_page_banner_img') }}" />
            <div class="w-full pt-2 flex justify-end">
                <x-button>
                    {{ __('Submit') }}
                </x-button>
            </div>

        </form>
    </div>

    <div class="mt-3">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white p-4 rounded ">
                <img width="50" id="prevImage" src="">
                <div class="flex flex-wrap justify-center w-full">
                    <x-labeled-input label="Image (800x500px)" type="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp" name="image" class="w-full md:w-1/2 p-1"
                        required oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />

                    <x-labeled-input name="title" class="w-full md:w-1/2 p-1" />

                    <div class="w-full pt-2 flex justify-end">
                        <x-button>{{ __('Create') }}</x-button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="w-full mt-2">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
    <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#data-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.gallery.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'delete': '{{ route('admin.gallery.destroy', '
                                @ ') }}'.replace('@',
                                    item.id),
                            });

                            item.image = `<img width="50" src='${item.image}' alt='${item.title}'>`;

                            return item;
                        });
                        return response.data;
                    }
                },

                columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'image',
                    orderable: false,
                },
                {
                    data: 'title',
                    orderable: false,
                    defaultContent: '--',
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
                ]
            });
        </script>
    </x-slot>
</x-admin-app-layout>
