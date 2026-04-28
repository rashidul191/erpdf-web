<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Project Progress') }}</div>

        <div>
            <a href="{{ route('admin.our-story.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>
    </div>

    <form action="{{ route('admin.business-setting.update') }}" method="POST" enctype="multipart/form-data"
        class="w-full bg-white p-2 rounded mt-4">
        @csrf
        <img width="50" height="50" id="prePPBannerImg" src="{{ business_image('pp_page_banner_img') }}">
        <x-labeled-input label="Page Banner Image (1600x600px)" type="file"
            accept="image/jpeg,image/png,image/jpg,image/webp" name="pp_page_banner_img" class="w-full p-1"
            onchange="prePPBannerImg.src=window.URL.createObjectURL(this.files[0])"
            value="{{ business_setting('pp_page_banner_img') }}" />

        <div class="w-full pt-4 flex justify-end">
            <x-button>
                {{ __('Submit') }}
            </x-button>
        </div>

    </form>

    <div class="w-full mt-4">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Year') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
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
                    url: '{{ route('admin.our-story.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.our-story.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.our-story.destroy', '@') }}'.replace('@',
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
                    data: 'date',
                    orderable: false,
                },
                {
                    data: 'title',
                    orderable: false,
                },
                {
                    data: 'description',
                    orderable: false,
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