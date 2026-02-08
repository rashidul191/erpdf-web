<x-admin-app-layout :title="__('Create User')">

    <div class="py-6 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create User') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.user.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap justify-center items-end w-full bg-white p-4">
            <x-labeled-input type="file" accept="image/*" name="avatar" class="w-full p-1 md:w-1/2 lg:w-1/3"
                required="true" />

            <x-labeled-input name="username" required class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="name" label="Name" required class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="phone" type="tel" min="0" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="email" type="email" class="w-full p-1 md:w-1/2 lg:w-1/3" /> <x-labeled-input
                name="address" required class="w-full p-1 md:w-1/2 lg:w-1/3" />


            {{-- <x-labeled-select name="status" label="Select Status" class="w-full p-1 md:w-1/2 lg:w-1/3" required>
                <option value="" disabled>Select Status</option>
                @foreach (\App\Enums\UserStatus::toSelectArray() as $key => $value)
                    <option value="{{ $key }}"
                        {{ \App\Enums\UserStatus::Active()->value === $key ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </x-labeled-select> --}}

            <x-labeled-input type="password" name="password" required class="w-full p-1 md:w-1/2 lg:w-1/3" />
            <x-labeled-input type="password" name="password_confirmation" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />
            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Create') }}</x-button>
            </div>
        </div>
    </form>

    <x-slot name="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('#area').on('change', function() {
                let areaId = $(this).val();

                $('#sub_area').html('<option value="">Loading...</option>');

                if (areaId) {

                    $.ajax({
                        url: "{{ route('admin.get-sub-areas', '') }}/" + areaId,
                        type: 'GET',
                        success: function(data) {
                            $('#sub_area').empty();
                            $('#sub_area').append('<option value="">Select Sub Area</option>');

                            $.each(data, function(key, subarea) {
                                $('#sub_area').append(
                                    '<option value="' + subarea.id + '">' + subarea
                                    .sub_area_name + '</option>'
                                );
                            });
                        }
                    });
                } else {
                    $('#sub_area').html('<option value="">Select Sub Area</option>');
                }
            });
        </script>

    </x-slot>
</x-admin-app-layout>
