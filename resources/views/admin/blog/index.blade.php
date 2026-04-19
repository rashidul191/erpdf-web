<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('News List') }}</div>

        <div>
            <a href="{{ route('admin.blog.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>
    </div>

    <div class="w-full mt-3">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Gallery Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Category') }}</th>
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
                    url: '{{ route('admin.blog.index') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {

                            item.action = actionIcons({
                                'edit': '{{ route('admin.blog.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.blog.destroy', '@') }}'.replace('@',
                                    item.id),
                            });
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
                        data: 'gallery_image',
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'name'
                    },

                    {
                        data: 'category.name',
                        defaultContent: '-',
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
