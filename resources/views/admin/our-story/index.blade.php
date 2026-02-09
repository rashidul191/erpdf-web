<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Our Story') }}</div>

        <div>
            <a href="{{ route('admin.our-story.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create Our Story') }}
            </a>
        </div>

    </div>      <div class="w-full mt-8">
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
                        response.data.map(function(item) {
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
