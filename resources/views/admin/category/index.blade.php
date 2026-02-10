<x-admin-app-layout>
    <div class="w-full flex justify-between mb-2">
        <div class="text-xl">{{ __('Categories') }}</div>
    </div>
    {{-- Create Form Start --}}
    <div class="bg-white p-2 rounded">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <img width="50" id="prevImage" src="">
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image"
                    class="w-full p-1 md:w-1/2" oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />
                <x-labeled-input name="name" required class="w-full p-1 md:w-1/2" />
                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Create') }}</x-button>
                </div>
            </div>
        </form>
    </div>
    {{-- Create Form End --}}

    {{-- Data Table Start --}}
    <div class="w-full mt-2">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
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
                    url: '{{ route('admin.categories.index') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.categories.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.categories.destroy', '@') }}'.replace('@',
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
