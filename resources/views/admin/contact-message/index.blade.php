<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Contact Messages') }}</div>
    </div>
    <x-business-setting-form>
        <div class="flex flex-wrap w-full">
            {{-- <x-labeled-input label="Title" name="contact_title" type="text"
                value="{!! business_setting('contact_title') !!}" class="w-full md:w-1/2 p-1" /> --}}

            <x-labeled-input label="Contact Page Phone" name="contact_phone" type="text"
                value="{!! business_setting('contact_phone') !!}" class="w-full md:w-1/2 p-1" />

            <x-labeled-input label="Contact Page Email" name="contact_email" type="text"
                value="{!! business_setting('contact_email') !!}" class="w-full md:w-1/2 p-1" />

            <x-labeled-input label="Contact Page Address" name="contact_address" type="text"
                value="{!! business_setting('contact_address') !!}" class="w-full md:w-1/2 p-1" />

            <x-labeled-textarea label="Google Map (script code)" name="contact_google_map_code" type="text"
                value="{!! business_setting('contact_google_map_code') !!}" class="w-full p-1" />

            <!-- <x-labeled-textarea label="Other Address" name="other_address" type="text" value="{!! business_setting('other_address') !!}"
                    class="w-full p-1 " is-editor="is-editor" /> -->
        </div>


    </x-business-setting-form>
    <div class="w-full mt-8">
        <table class="w-full my_table" id="teams-table">
            <thead class="text-center">
                <tr>
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <!-- <th>{{ __('Subject') }}</th> -->
                    <th>{{ __('Message') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
    <x-slot name="script">
        <script type="text/javascript" src="{{ mix('js/datatable.js') }}"></script>
        <script type="text/javascript">
            $('#teams-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.contact-message.index') }}',
                    dataSrc(response) {
                        response.data.map(function (item) {
                            item.action = actionIcons({
                                'show': '{{ route('admin.contact-message.show', '
                                @ ') }}'.replace('@', item
                                    .id),
                                'delete': '{{ route('admin.contact-message.destroy', '
                                @ ') }}'.replace('@',
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
                    data: 'name',
                    orderable: false,
                },

                {
                    data: 'email',
                    orderable: false,
                },
                // {
                //     data: 'subject',
                //     orderable: false,
                // },
                {
                    data: 'message',
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
