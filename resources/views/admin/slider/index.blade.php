<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Sliders') }}</div>
    </div>

    <div class="flex flex-wrap justify-between">
        <div class="w-full md:w-2/5 md:pr-3">
            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="bg-white p-4">
                    <img width="100" id="prevImage" src="">
                    <div class="w-full">
                        <x-labeled-input label="Image (1400x500)" type="file"
                            accept="image/*" name="image" class="w-full p-1"
                            required oninput="prevImage.src=window.URL.createObjectURL(this.files[0])" />

                        <x-labeled-input label="Page Link End Point (/products)" name="page_link" class="w-full p-1" />

                        <label class="inline-flex items-center mt-2">
                            <input type="checkbox" name="is_home" value="{{ \App\Enums\IsHomeStatus::Yes }}"
                                class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                            <span class="text-gray-700 ml-2">Is Home</span>
                        </label>

                        <div class="w-full pt-4 flex justify-end">
                            <x-button>{{ __('Create') }}</x-button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

        <div class="w-full md:w-3/5 md:pl-3">
            <table class="w-full my_table" id="categories-table">
                <thead class="text-center">
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Page Link') }}</th>
                        <th>{{ __('Is Home') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>      <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#categories-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.slider.index') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.slider.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.slider.destroy', '@') }}'.replace('@',
                                    item.id),
                            });

                            item.image = `<img width="100" src='${item.image}' alt='${item.name}'>`;

                            item.is_home = item.is_home ?
                                `<span class='bg-green-500 font-bold text-white rounded px-1'>Yes</span>` :
                                '<span class="bg-red-500 font-bold text-white rounded px-1">No</span>'

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
                        data: 'page_link'
                    },
                    {
                        data: 'is_home',
                        searchable: false
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
