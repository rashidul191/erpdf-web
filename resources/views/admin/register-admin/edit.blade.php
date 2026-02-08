<x-admin-app-layout :title="__('Edit Register Admin')">

    <div class="py-6 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Register Admin') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.register-admin.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.register-admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex flex-wrap items-end justify-center w-full bg-white p-4">              <x-labeled-input name="email" type="email" value="{{ $user->email }}" readonly
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="name" label="Name" value="{{ $user->name }}" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="phone" type="tel" value="{{ $user->phone }}" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

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

</x-admin-app-layout>
