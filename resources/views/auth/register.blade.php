<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <x-labeled-input class="py-1" name="username" pattern="^[a-zA-Z0-9_-]+$" required />
            <x-labeled-input class="py-1" name="name" required />
            <x-labeled-input class="py-1" name="phone" type="tel" maxlength="11" placeholder="01...."
                pattern="^01\d{9}$" title="Enter 11 digit phone number" required />
            <x-labeled-input class="py-1" name="email" required />

            {{-- <x-labeled-input class="py-1" name="referrer" label="Referrer username" required/> --}}
            {{-- <x-labeled-input class="py-1" name="placement" label="Placement username" required/> --}}
            {{-- <div class="w-full mt-4">
                <x-label :value="__('Direction')"/>
                <div class="w-full flex mt-2">
                    <label class="w-1/2 flex justify-center items-stretch rounded-lg cursor-pointer">
                        <input type="radio" name="placement_direction"
                               value="{{ \App\Enums\PlacementDirection::Left }}"
                               class="border opacity-0 peer" @if (request('d') == 'left') checked @endif required/>
                        <div
                            class="p-2 whitespace-nowrap w-full flex justify-center items-center border-2 border-gray-400 rounded-lg bg-transparent peer-checked:bg-green-600">
                            Left
                        </div>
                    </label>
                    <label class="w-1/2 flex justify-center items-stretch rounded-lg cursor-pointer">
                        <input type="radio" name="placement_direction"
                               value="{{ \App\Enums\PlacementDirection::Right }}"
                               class="border opacity-0 peer" @if (request('d') == 'right') checked @endif required/>
                        <div
                            class="p-2 whitespace-nowrap w-full flex justify-center items-center border-2 border-gray-400 rounded-lg bg-transparent peer-checked:bg-green-600">
                            Right
                        </div>
                    </label>
                </div>
            </div> --}}
            <x-labeled-input class="py-1" name="address" required />

            <x-labeled-input class="py-1" type="password" name="password" autocomplete="new-password" required />
            <x-labeled-input class="py-1" type="password" name="password_confirmation" required />

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
