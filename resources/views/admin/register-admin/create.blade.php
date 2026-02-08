<x-admin-app-layout :title="__('Create Register Admin')">

    <div class="py-6 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Create Register Admin') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.register-admin.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('admin.register-admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap justify-center w-full bg-white p-4">
            <x-labeled-input name="email" type="email" required class="w-full p-1 md:w-1/2 lg:w-1/3" />
            <x-labeled-input name="name" label="Name" required class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input name="phone" type="tel" min="0" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <x-labeled-input type="password" name="password" required class="w-full p-1 md:w-1/2 lg:w-1/3" />
            <x-labeled-input type="password" name="password_confirmation" required
                class="w-full p-1 md:w-1/2 lg:w-1/3" />

            <div class="w-full pt-4 flex justify-end">
                <x-button>{{ __('Create') }}</x-button>
            </div>
        </div>
    </form>

</x-admin-app-layout>
