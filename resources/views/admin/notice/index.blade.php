<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Notice') }}</div>
        <div>
            <a href="{{ route('admin.notice.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create Notice') }}
            </a>
        </div>
    </div>
    <div class="w-full flex flex-wrap">
        <div class="w-full md:w-1/3 p-2">
            <x-business-setting-form>
                <x-is-show name="notice_is_show" />
            </x-business-setting-form>
        </div>
        <div class="w-full md:w-2/3  p-3 mt-3">
            <form action="{{ route('admin.notice.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded p-3">
                @csrf

                <x-labeled-textarea label="Notice Content" name="title" required></x-labeled-textarea>
                <div class="w-full pt-2 flex justify-end">
                    <x-button> {{ __('Create') }}</x-button>
                </div>
            </form>
        </div>
    </div>



    <div class="w-full mt-2">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Title') }}</th>
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
                    url: '{{ route('admin.notice.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'edit': '{{ route('admin.notice.edit', '@') }}'.replace('@', item.id),
                                'delete': '{{ route('admin.notice.destroy', '@') }}'.replace('@', item.id),
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
                    data: 'title',
                    orderable: false,
                    defaultContent: '--',
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
