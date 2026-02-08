<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Register Admin') }}</div>

        <div>
            <a href="{{ route('admin.register-admin.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create Register Admin') }}
            </a>
        </div>
    </div>

    <div class="w-full mt-8">
        <table class="w-full" id="users-table">
            <thead>
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Regi At') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
    <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#users-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.register-admin.index') }}?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {
                            let actionConfig = {
                                // 'show': '{{ route('admin.register-admin.show', '@') }}'.replace('@', item
                                //     .id),
                                'edit': '{{ route('admin.register-admin.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.register-admin.destroy', '@') }}'.replace('@',
                                    item
                                    .id),
                            }
                            item.action = actionIcons(actionConfig);
                            item.created_at = (new Date(item.created_at)).toLocaleDateString()
                            return item;
                        });
                        return response.data;
                    }
                },
                // dom:
                //     "<'flex flex-wrap'<'w-full flex justify-center my-1 sm:justify-end sm:w-1/2'f>>" +
                //     "<'flex my-4'<'w-full overflow-y-auto'tr>>" +
                //     "<'flex flex-wrap'<'w-full my-2 sm:w-1/3'i><'w-full sm:w-2/3 text-right'p>>",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'created_at'
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
