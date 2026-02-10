<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Tags') }}</div>

        <div>
            <a href="{{ route('admin.tag.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create Tag') }}
            </a>
        </div>

    </div>      <div class="w-full mt-8">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Display Name') }}</th>
                    <th>{{ __('Position') }}</th>
                    <th>{{ __('Is Home') }}</th>
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
                    url: '{{ route('admin.tag.index') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.tag.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.tag.destroy', '@') }}'.replace('@',
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
                        data: 'name'
                    },
                    {
                        data: 'position'
                    },
                    {
                        data: 'is_home'
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
