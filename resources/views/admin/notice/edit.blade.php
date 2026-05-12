<x-admin-app-layout :title="__('Edit Notice')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Notice') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.notice.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="w-full bg-white rounded p-3 mt-3">
        <form action="{{ route('admin.notice.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-labeled-textarea label="Notice Content" name="title" value="{!! $notice->title !!}"
                required></x-labeled-textarea>
            <div class="w-full pt-2 flex justify-end">
                <x-button> {{ __('Updated') }}</x-button>
            </div>
        </form>
    </div>
</x-admin-app-layout>
