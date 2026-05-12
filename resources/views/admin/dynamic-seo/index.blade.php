<x-admin-app-layout :title="__('Meta Script')">
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Meta Script') }}</div>

        <div>
            <a href="{{ route('admin.dynamic-seo.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create Meta Script') }}
            </a>
        </div>

    </div>
    <div class="w-full mt-8">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Page Link') }}</th>                    
                    <!-- <th>{{ __('Meta Script') }}</th> -->
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
                    url: '{{ route('admin.dynamic-seo.index') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.dynamic-seo.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.dynamic-seo.destroy', '@') }}'.replace('@',
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
                        data: 'page_link',
                        orderable: false,
                    },
                    
                    // {
                    //     data: 'meta_script',
                    //     orderable: false,
                    // },

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