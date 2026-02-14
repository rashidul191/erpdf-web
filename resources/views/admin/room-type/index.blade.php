<x-admin-app-layout>
    <div class="w-full flex justify-between mb-2">
        <div class="text-xl">{{ __('Room Types') }}</div>
    </div>

    <div class="w-full md:flex items-start space-x-4">
        {{-- Create Form Start --}}
        <div class="w-full md:w-1/3 bg-white p-2 rounded">
            <form action="{{ route('admin.room-types.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap justify-center w-full">
                    <x-labeled-input name="name" required class="w-full p-1" />
                    <div class="w-full pt-4 flex justify-end">
                        <x-button>{{ __('Create') }}</x-button>
                    </div>
                </div>
            </form>
        </div>
        {{-- Create Form End --}}

        {{-- Data Table Start --}}
        <div class="w-full md:w-2/3 mt-2 md:mt-0">
            <table class="w-full my_table" id="data-table">
                <thead class="text-center">
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
        {{-- Data Table End --}}
    </div>


    <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#data-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.room-types.index') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.room-types.edit', '@') }}'.replace('@', item.id),
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
                        data: 'name',
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