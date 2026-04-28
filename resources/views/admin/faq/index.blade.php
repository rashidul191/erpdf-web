<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('FAQ List') }}</div>

        <div>
            <a href="{{ route('admin.faq.create') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 text-sm font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                + {{ __('Create') }}
            </a>
        </div>
    </div>
    <div class="w-full mt-4 bg-white p-4 rounded">
        <form action="{{ route('admin.business-setting.update') }}" method="POST" enctype="multipart/form-data"
            class="w-full">
            @csrf
            <img width="50" height="50" id="preFAQPageBannerImg" src="{{ business_image('faq_page_banner_img') }}">
            <x-labeled-input label="Page Banner Image (1600x600px)" type="file"
                accept="image/jpeg,image/png,image/jpg,image/webp" name="faq_page_banner_img" class="w-full p-1"
                onchange="preFAQPageBannerImg.src=window.URL.createObjectURL(this.files[0])"
                value="{{ business_setting('faq_page_banner_img') }}" />
            <div class="w-full pt-2 flex justify-end">
                <x-button>
                    {{ __('Submit') }}
                </x-button>
            </div>

        </form>
    </div>

    <div class="w-full mt-3">
        <table class="w-full my_table" id="data-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Question') }}</th>
                    <th>{{ __('Answer') }}</th>
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
                    url: '{{ route('admin.faq.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {

                            item.action = actionIcons({
                                'edit': '{{ route('admin.faq.edit', '@') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.faq.destroy', '@') }}'.replace('@',
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
                    data: 'question',
                    defaultContent: '-',
                },
                {
                    data: 'answer',
                    defaultContent: '-',
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