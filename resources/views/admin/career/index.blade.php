<x-admin-app-layout>
    <div class="w-full flex justify-between mb-2">
        <div class="text-xl">{{ __('Application List') }}</div>
    </div>



    {{-- Data Table Start --}}
    <div class="w-full mt-2">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Education') }}</th>
                    <th>{{ __('Occupation') }}</th>
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
                    url: '{{ route('admin.career.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'show': '{{ route('admin.career.show', '@') }}'.replace('@',
                                    item.id),
                                'delete': '{{ route('admin.career.destroy', '@') }}'.replace('@',
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
                    data: 'image'
                },
                {
                    data: 'name',
                },
                {
                    data: 'phone',
                },
                {
                    data: 'email',
                    defaultContent: '-'
                },
                {
                    data: 'education',
                    defaultContent: '-'
                },
                {
                    data: 'occupation',
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
