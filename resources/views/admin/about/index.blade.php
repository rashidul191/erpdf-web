<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('About Section') }}</div>
    </div>

    <x-business-setting-form>
        <div class="flex flex-wrap w-full items-end">
            <div class="w-full md:w-1/2 p-1">
                <img width="50" height="50" id="preAboutBannerImg" src="{{ business_image('about_page_banner_img') }}">
                <x-labeled-input label="Page Banner Image (1920x800px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="about_page_banner_img" class="w-full p-1"
                    onchange="preAboutBannerImg.src=window.URL.createObjectURL(this.files[0])"
                    value="{{ business_setting('about_page_banner_img') }}" />
            </div>
            <div class="w-full md:w-1/2 p-1">
                <img width="50" height="50" id="preAboutLeftImg" src="{{ business_image('about_page_left_img') }}">
                <x-labeled-input label="About Page Left Image (610x610px)" type="file"
                    accept="image/jpeg,image/png,image/jpg,image/webp" name="about_page_left_img" class="w-full p-1"
                    onchange="preAboutLeftImg.src=window.URL.createObjectURL(this.files[0])"
                    value="{{ business_setting('about_page_left_img') }}" />
            </div>
            <x-labeled-input label="Title" name="about_page_title" value="{!! business_setting('about_page_title') !!}"
                class="w-full md:w-1/2 p-1" />
            <x-labeled-input label="Sub Title" name="about_page_sub_title"
                value="{!! business_setting('about_page_sub_title') !!}" class="w-full md:w-1/2 p-1" />
            <x-labeled-textarea label="Content" name="about_page_content"
                value="{!! business_setting('about_page_content') !!}" is-editor="is-editor" class="w-full p-1" />

        </div>
    </x-business-setting-form>

</x-admin-app-layout>
