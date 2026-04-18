<x-admin-app-layout>

    <div class="w-full flex flex-wrap">
        <div class="w-full md:w-1/3 p-3">
            <x-menu-manage></x-menu-manage>
        </div>
        <div class="w-full md:w-2/3">
            <div class="w-full flex justify-between mb-2">
                <div class="text-xl">{{ __('Sub of Sub Menu List') }}</div>
                <div>
                    <a href="{{ route('admin.sub-of-sub-menu.create') }}"
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
                            {{-- <th>{{ __('Image') }}</th> --}}
                            <th>{{ __('Sub Menu Name') }}</th>
                            <th>{{ __('Sub of Sub Menu Name') }}</th>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            {{-- Data Table End --}}
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#data-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.sub-of-sub-menu.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.sub-of-sub-menu.edit', '@') }}'.replace('@', item
                                    .id),
                                // 'delete': '{{ route('admin.sub-of-sub-menu.destroy', '@') }}'.replace('@',
                                //     item.id),
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
                    data: 'sub_menu_name',
                },
                {
                    data: 'page.title',
                },

                {
                    data: 'serial',
                    defaultContent: '-'
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
