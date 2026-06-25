<x-admin-app-layout>
    <x-business-setting-form>
        <div class="w-full pt-4 flex justify-end">
            <x-button>
                {{ __('Submit') }}
            </x-button>
        </div>
        <h4 class="text-lg">{{ __('Header Content :') }}</h4>
        <div class="border-2 border-gray-400 rounded p-3">
            <div class="flex flex-wrap w-full">

                <div class="flex flex-wrap items-center w-full md:w-1/2">
                    <img width="50" height="50" id="prevMetaIcon" src="{{ business_image('meta_icon') }}">
                    <x-labeled-input label="Meta Icon (64x64px)" type="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp" name="meta_icon"
                        class="w-full md:w-[89%] p-1"
                        onchange="prevMetaIcon.src=window.URL.createObjectURL(this.files[0])"
                        value="{{ business_setting('meta_icon') }}" />
                </div>

                <div class="flex flex-wrap items-center w-full md:w-1/2">
                    <img width="50" height="50" id="prevImage" src="{{ business_image('logo') }}">
                    <x-labeled-input label="Website Logo (300x280px)" type="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp" name="logo" class="w-full md:w-[89%] p-1"
                        onchange="prevImage.src=window.URL.createObjectURL(this.files[0])"
                        value="{{ business_setting('logo') }}" />
                </div>

                <x-labeled-input name="website_name" type="text" value="{!! business_setting('website_name') !!}"
                    class="w-full md:w-1/2 p-1" />

                <x-labeled-input label="Navbar Phone" name="navbar_phone" type="text"
                    value="{!! business_setting('navbar_phone') !!}" class="w-full md:w-1/2 p-1" />
                <x-labeled-input label="Navbar Phone 2" name="navbar_phone_2" type="text"
                    value="{!! business_setting('navbar_phone_2') !!}" class="w-full md:w-1/2 p-1" />
                <x-labeled-input label="Navbar Email" name="navbar_email" type="text"
                    value="{!! business_setting('navbar_email') !!}" class="w-full md:w-1/2 p-1" />

                <x-labeled-input label="Office Date And Time" name="office_time" type="text"
                    value="{!! business_setting('office_time') !!}" class="w-full md:w-1/2 p-1" />
            </div>
        </div>

        <h4 class="text-lg mt-3">{{ __('Footer Content :') }}</h4>
        <div class="border-2 border-gray-400 rounded p-3">
            <div class="flex flex-wrap w-full">
                <div class="flex flex-wrap items-center w-full md:w-1/2">
                    <img width="50" height="50" id="footerPrevImage" src="{{ business_image('footer_logo') }}">
                    <x-labeled-input label="Footer Logo (300x280px)" type="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp" name="footer_logo"
                        class="w-full md:w-[89%] p-1"
                        onchange="footerPrevImage.src=window.URL.createObjectURL(this.files[0])"
                        value="{{ business_setting('footer_logo') }}" />
                </div>
                {{-- <x-labeled-textarea label="Company Summary" name="company_summary" type="text"
                    value="{!! business_setting('company_summary') !!}" class="w-full md:w-1/2  p-1 " /> --}}

                <x-labeled-input name="footer_phone" type="text" value="{!! business_setting('footer_phone') !!}"
                    class="w-full md:w-1/2 p-1" />

                <x-labeled-input name="footer_email" type="text" value="{!! business_setting('footer_email') !!}"
                    class="w-full md:w-1/2 p-1" />

                {{-- <x-labeled-input label="Main Send Email" name="admin_email" type="text"
                    value="{!! business_setting('admin_email') !!}" class="w-full md:w-1/2 p-1" /> --}}

                <x-labeled-input name="footer_address" type="text" value="{!! business_setting('footer_address') !!}"
                    class="w-full md:w-1/2 p-1" />

                <x-labeled-input name="copyright_text" type="text" value="{!! business_setting('copyright_text') !!}"
                    class="w-full md:w-1/2 p-1" />
            </div>
        </div>
    </x-business-setting-form>
</x-admin-app-layout>
