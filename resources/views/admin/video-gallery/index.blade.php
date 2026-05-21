<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Video Galleries') }}</div>

        <div>
            <a href="{{ route('admin.video-gallery.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>
    </div>

    <div class="w-full flex flex-wrap items-center mt-3">
        <div class="w-full md:w-1/2 p-1">
            <x-business-setting-form>
                <x-is-show name="video_gallery_is_show"></x-is-show>

                <div class="w-full flex flex-wrap">
                    <x-labeled-input label="Section Title" name="video_gallery_section_title"
                        value="{{ business_setting('video_gallery_section_title') }}" class="w-full p-1" />
                    <x-labeled-input label="Section Sub Title (optional)" name="video_gallery_section_sub_title"
                        value="{{ business_setting('video_gallery_section_sub_title') }}" class="w-full p-1" />
                </div>
            </x-business-setting-form>

        </div>
        <div class="w-full md:w-1/2 p-1">
            <form action="{{ route('admin.video-gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="bg-white p-4 rounded flex flex-wrap justify-center w-full">
                    <x-labeled-input name="youtube_video_link" required class="w-full p-1" />
                    <x-labeled-input type="number" name="serial" class="w-full  p-1" />

                    <div class="w-full pt-2 flex justify-end">
                        <x-button>{{ __('Create') }}</x-button>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <div class="w-full mt-2">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Youtube Video Link') }}</th>
                    <th>{{ __('Serial') }}</th>
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
                    url: '{{ route('admin.video-gallery.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'delete': '{{ route('admin.video-gallery.destroy', '
                                @') }}'.replace('@',
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
                    data: 'youtube_video_link',
                    orderable: false,
                },
                {
                    data: 'serial',
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
