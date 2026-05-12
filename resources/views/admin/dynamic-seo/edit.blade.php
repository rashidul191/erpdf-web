<x-admin-app-layout :title="__('Edit Meta Script')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Edit Meta Script') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.dynamic-seo.index') }}">{{ __('Back') }}</a>
        </div>
    </div>
    <div class="bg-white p-4">
        <form action="{{ route('admin.dynamic-seo.update', $dynamicSEO->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap justify-center w-full">
                <x-labeled-input label="Page Full Link (https://domain.com/page-name)" name="page_link" required="true"
                    value="{{ url($dynamicSEO->page_link)  }}" class="w-full p-1" />

                <x-labeled-textarea label="Meta Script" name="meta_script" required="true"
                    value="{!! $dynamicSEO->meta_script !!}" class="w-full p-1" />

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
