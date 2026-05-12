<div class="w-full mt-4 bg-white p-4 rounded">
    <form action="{{ route('admin.business-setting.update') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        {{ $slot }}

        <div class="w-full pt-4 flex justify-end">
            <x-button>
                {{ __('Submit') }}
            </x-button>
        </div>
    </form>
</div>