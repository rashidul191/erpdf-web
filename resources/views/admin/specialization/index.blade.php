<x-admin-app-layout>
    <div class="w-full flex justify-between">
        <div class="text-xl">{{ __('Our Specialization') }}</div>
    </div>

    <div class="w-full mt-4">
        <form action="{{ route('admin.business-setting.update') }}" method="POST" enctype="multipart/form-data"
            class="w-full">
            @csrf
            <div class="bg-white p-4">
                <div class="flex flex-wrap w-full">

                    <div class="flex flex-wrap items-center w-full md:w-1/2">
                        <img width="50" height="50" id="preRoomImg" src="{{ business_image('spe_room_img') }}">
                        <x-labeled-input label="Room Image (1920x800px)" type="file"
                            accept="image/jpeg,image/png,image/jpg,image/webp" name="spe_room_img"
                            class="w-full md:w-[89%] p-1"
                            onchange="preRoomImg.src=window.URL.createObjectURL(this.files[0])"
                            value="{{ business_setting('spe_room_img') }}" />
                    </div>
                    <div class="flex flex-wrap items-center w-full md:w-1/2">
                        <img width="50" height="50" id="preRestaurantImg"
                            src="{{ business_image('spe_restaurant_img') }}">
                        <x-labeled-input label="Restaurant Image (1920x800px)" type="file"
                            accept="image/jpeg,image/png,image/jpg,image/webp" name="spe_restaurant_img"
                            class="w-full md:w-[89%] p-1"
                            onchange="preRestaurantImg.src=window.URL.createObjectURL(this.files[0])"
                            value="{{ business_setting('spe_restaurant_img') }}" />
                    </div>

                    <div class="flex flex-wrap items-center w-full md:w-1/2">
                        <img width="50" height="50" id="preLuxuryImg" src="{{ business_image('spe_luxury_img') }}">
                        <x-labeled-input label="Luxury Image (1920x800px)" type="file"
                            accept="image/jpeg,image/png,image/jpg,image/webp" name="spe_luxury_img"
                            class="w-full md:w-[89%] p-1"
                            onchange="preLuxuryImg.src=window.URL.createObjectURL(this.files[0])"
                            value="{{ business_setting('spe_luxury_img') }}" />
                    </div>
                    <div class="flex flex-wrap items-center w-full md:w-1/2">
                        <img width="50" height="50" id="preMeetingHallImg"
                            src="{{ business_image('spe_meeting_hall_img') }}">
                        <x-labeled-input label="Meeting Hall Image (1920x800px)" type="file"
                            accept="image/jpeg,image/png,image/jpg,image/webp" name="spe_meeting_hall_img"
                            class="w-full md:w-[89%] p-1"
                            onchange="preMeetingHallImg.src=window.URL.createObjectURL(this.files[0])"
                            value="{{ business_setting('spe_meeting_hall_img') }}" />
                    </div>

                    <div class="w-full md:flex space-x-3 mt-3">
                        <div class="border w-full md:flex md:w-1/3 p-2 rounded">
                            <x-labeled-input label="Count Number 1" name="spe_count_number_1" type="number" min="0"
                                value="{!! business_setting('spe_count_number_1') !!}" class="w-full md:w-1/3 p-1" />

                            <x-labeled-input label="Count Title 1" name="spe_count_title_1" type="text"
                                value="{!! business_setting('spe_count_title_1') !!}" class="w-full md:w-2/3 p-1" />
                        </div>
                        <div class="border w-full md:flex md:w-1/3 p-2 rounded">
                            <x-labeled-input label="Count Number 2" name="spe_count_number_2" type="number" min="0"
                                value="{!! business_setting('spe_count_number_2') !!}" class="w-full md:w-1/3 p-1" />

                            <x-labeled-input label="Count Title 2" name="spe_count_title_2" type="text"
                                value="{!! business_setting('spe_count_title_2') !!}" class="w-full md:w-2/3 p-1" />
                        </div>
                        <div class="border w-full md:flex md:w-1/3 p-2 rounded">
                            <x-labeled-input label="Count Number 3" name="spe_count_number_3" type="number" min="0"
                                value="{!! business_setting('spe_count_number_3') !!}" class="w-full md:w-1/3 p-1" />

                            <x-labeled-input label="Count Title 3" name="spe_count_title_3" type="text"
                                value="{!! business_setting('spe_count_title_3') !!}" class="w-full md:w-2/3 p-1" />
                        </div>
                    </div>
                    <x-labeled-input label="Title" name="spe_title" type="text"
                        value="{!! business_setting('spe_title') !!}" class="w-full p-1" required />

                    {{-- <x-labeled-textarea label="Short Description" name="spe_description" type="text"
                        value="{!! business_setting('spe_description') !!}" required class="w-full p-1" /> --}}

                    <x-labeled-textarea label="Short Description" name="spe_description" is-editor="is-editor"
                        :value="old('spe_description', business_setting('spe_description'))"
                        class="w-full p-1"></x-labeled-textarea>

                </div>
                <div class="w-full
                            pt-4 flex justify-end">
                    <x-button>
                        {{ __('Update') }}
                    </x-button>
                </div>
            </div>
        </form>
    </div>

</x-admin-app-layout>
