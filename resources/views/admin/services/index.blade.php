<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Our Services') }}</div>

        <div>
            <a href="{{ route('admin.services.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>
    </div>

    <x-business-setting-form>
        <x-is-show name="service_is_show"></x-is-show>
        <div class="w-full flex flex-wrap">
            <x-labeled-input label="Section Title" name="service_section_title"
                value="{!! business_setting('service_section_title') !!}" class="w-full md:w-1/2 p-1" />

            <x-labeled-input label="Section Sub Title" name="service_section_sub_title"
                value="{!! business_setting('service_section_sub_title') !!}" class="w-full md:w-1/2 p-1" />
        </div>
    </x-business-setting-form>

    <div class="w-full mt-8">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Serial') }}</th>
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
                    url: '{{ route('admin.services.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.services.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.services.destroy', '@') }}'.replace('@',
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
                    data: 'title',
                    orderable: false,
                },
                {
                    data: 'serial',
                    defaultContent: "--"

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
