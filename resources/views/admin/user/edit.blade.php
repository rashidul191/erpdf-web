<x-admin-app-layout :title="__('Edit User')">

    <div class="py-6 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit User') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.user.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex flex-wrap items-end justify-center w-full bg-white p-4">
            <div class="flex md:w-1/2 lg:w-1/3">
                @if ($user->avatar)
                    <img src="{{ asset($user->avatar) }}" class="h-20 rounded m-2">
                @endif
                {{-- Avatar --}}
                <x-labeled-input type="file" accept="image/*" name="avatar" class="w-full p-1" />
            </div>


            <x-labeled-input name="username" value="{{ $user->username }}" readonly
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="name" label="Name" value="{{ $user->name }}" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="phone" type="tel" value="{{ $user->phone }}" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="email" type="email" value="{{ $user->email }}"
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="address" value="{{ $user->address }}" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />


            {{-- STATUS --}}
            <x-labeled-select name="status" label="Select Status" class="w-full p-1 md:w-1/2 lg:w-1/3" required>
                @foreach (\App\Enums\UserStatus::toSelectArray() as $key => $value)
                    <option value="{{ $key }}" {{ $user->status->value == $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </x-labeled-select>

            {{-- PASSWORD OPTIONAL --}}
            <x-labeled-input type="password" name="password" class="w-full p-1 md:w-1/2 lg:w-1/3"
                label="New Password (optional)" />

            <x-labeled-input type="password" name="password_confirmation" class="w-full p-1 md:w-1/2 lg:w-1/3"
                label="Confirm Password" />

            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Update') }}</x-button>
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
                $('#sub_area').html('<option>Loading...</option>');

                $.ajax({
                    url: "{{ route('admin.get-sub-areas', '') }}/" + areaId,
                    type: 'GET',
                    success: function(data) {
                        $('#sub_area').empty();
                        $('#sub_area').append('<option value="">Select Sub Area</option>');

                        $.each(data, function(i, sub) {
                            $('#sub_area').append('<option value="' + sub.id + '">' + sub
                                .sub_area_name + '</option>');
                        });
                    }
                });
            });
        </script>
    </x-slot>
</x-admin-app-layout>
