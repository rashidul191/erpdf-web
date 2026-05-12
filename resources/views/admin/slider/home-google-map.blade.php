<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Google Map Section') }}</div>
    </div>
    <x-business-setting-form>
        <x-is-show name="google_map_is_show" />
        <x-labeled-textarea label="Home Page Google Map (script code)" name="hp_google_map_code"
            value="{!! business_setting('hp_google_map_code') !!}" class="w-full p-1" />
    </x-business-setting-form>
</x-admin-app-layout>
