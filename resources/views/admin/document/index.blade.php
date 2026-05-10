<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Documents') }}</div>

        <div>
            <a href="{{ route('admin.document.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>

    </div>
    <div class="w-full mt-8">
        <table class="w-full my_table" id="teams-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Categroy') }}</th>
                    <th>{{ __('File') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Serial') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
    <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#teams-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.document.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.document.edit', '@') }}'.replace('@', item.id),
                                'delete': '{{ route('admin.document.destroy', '@') }}'.replace('@', item.id),
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
                    data: 'category.name',
                    orderable: false,
                },
                {
                    data: 'file',
                    orderable: false,
                },
                {
                    data: 'name',
                    orderable: false,
                },


                {
                    data: 'serial',
                    orderable: false,
                    defaultContent: '-'
                },
                {
                    data: 'status',
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
