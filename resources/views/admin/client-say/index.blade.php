<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Client Review') }}</div>

        <div>
            <a href="{{ route('admin.client-say.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create Client Review') }}
            </a>
        </div>
    </div>

    <div class="bg-white p-4 mt-3 rounded">
        <form action="{{ route('admin.business-setting.update') }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            <div class="w-full">
                <img width="50" height="50" id="prevMetaIcon" src="{{ business_image('client_say_bg_img') }}">
                <x-labeled-input label="Client Review BG Image (1900x570px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="client_say_bg_img"
                    class="w-full p-1"
                    onchange="prevMetaIcon.src=window.URL.createObjectURL(this.files[0])"
                    value="{{ business_setting('client_say_bg_img') }}" />
            </div>
            <div class="w-full pt-4 flex justify-end">
                <x-button>
                    {{ __('Add') }}
                </x-button>
            </div>
        </form>
    </div>


    <div class="w-full mt-3">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Address') }}</th>
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
                    url: '{{ route('
                    admin.client - say.index ') }}',
                    dataSrc(response) {
                        response.data.map(function(item) {
                            item.action = actionIcons({
                                'edit': '{{ route('
                                admin.client - say.edit ', '

                                @ ') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('
                                admin.client - say.destroy ', '
                                @ ') }}'.replace('@',
                                    item.id),
                            });

                            item.image = `<img width="50" src='${item.image}' alt='${item.name}'>`;

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
                        data: 'name',
                        orderable: false,
                    },
                    {
                        data: 'address',
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