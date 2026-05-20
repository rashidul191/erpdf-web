<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Client Review') }}</div>

        <div>
            <a href="{{ route('admin.client-say.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>
    </div>

    <x-business-setting-form>
        <x-is-show name="client_review_is_show"></x-is-show>

        <div class="w-full flex flex-wrap">
            <x-labeled-input label="Section Title" name="cr_title" value="{!! business_setting('cr_title') !!}"
                class="w-full md:w-1/2 p-1" />

            <x-labeled-input label="Section Sub Title" name="cr_sub_title"
                value="{!! business_setting('cr_sub_title') !!}" class="w-full md:w-1/2 p-1" />
        </div>

    </x-business-setting-form>


    <div class="w-full mt-3">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Designation') }}</th>
                    <th>{{ __('Review Text') }}</th>
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
                    url: '{{ route('admin.client-say.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.client-say.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.client-say.destroy', '@') }}'.replace('@',
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
                    data: 'designation',
                    orderable: false,
                },
                {
                    data: 'review_text',
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
