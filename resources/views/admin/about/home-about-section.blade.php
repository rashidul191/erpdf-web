<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('About Section') }}</div>
    </div>
    <x-business-setting-form>
        <x-is-show name="about_is_show" />

        <div class="flex flex-wrap w-full items-end">
            <img width="50" height="50" id="preHALeftImg" src="{{ business_image('ha_left_img') }}">

            <x-labeled-input label="About Page Left Image (610x610px)" type="file"
                accept="image/jpeg,image/png,image/jpg,image/webp" name="ha_left_img"
                class="w-full p-1"
                onchange="preHALeftImg.src=window.URL.createObjectURL(this.files[0])"
                value="{{ business_setting('ha_left_img') }}" />

            <x-labeled-input label="Title" name="ha_title"
                value="{!! business_setting('ha_title') !!}" class="w-full md:w-1/2 p-1" />
            <x-labeled-input label="Sub Title" name="ha_sub_title"
                value="{!! business_setting('ha_sub_title') !!}" class="w-full md:w-1/2 p-1" />
            <x-labeled-textarea label="Content" name="ha_content"
                value="{!! business_setting('ha_content') !!}" is-editor="is-editor" class="w-full p-1" />

        </div>
    </x-business-setting-form>


</x-admin-app-layout>