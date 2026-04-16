<x-admin-app-layout>
    <div class="w-full flex justify-between mb-2">
        <div class="text-xl">{{ __('Content Manage List') }}</div>
        <div>
            <a href="{{ route('admin.content-manage.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>
    </div>
    {{-- Data Table Start --}}
    <div class="w-full mt-2">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Menu Name') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
    {{-- Data Table End --}}
    <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#data-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.content-manage.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.content-manage.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.content-manage.destroy', '@') }}'.replace('@',
                                    item.id),
                            });

                            item.image =
                                `<img width="50" src='${item.image}' alt='${item.name}'>`; // console.log(item.sup_category[0].name);
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
                    data: 'menu.name',
                },
                {
                    data: 'image',
                },
                {
                    data: 'title',
                },
                {
                    data: 'slug',
                },
                {
                    data: 'status',
                    defaultContent: '-'
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
