@props(['name'])

<div class="w-full mb-3">
    <p class="text-lg font-semibold text-gray-700 mb-4">
        {{ __('Section Is Show In Home Page') }}
    </p>

    <div class="flex flex-wrap gap-6">
        @foreach (\App\Enums\IsHomeStatus::getInstances() as $status)

            @php
                $id = $name . '-' . $status->value;
            @endphp

            <label for="{{ $id }}"
                class="flex items-center gap-3 cursor-pointer border-2 border-gray-400 px-2 py-1.5 rounded">

                <input
                    type="radio"
                    name="{{ $name }}"
                    id="{{ $id }}"
                    value="{{ $status->value }}"
                    class="peer sr-only"
                    {{ old($name, business_setting($name)) == $status->value ? 'checked' : '' }}
                >

                <div class="w-5 h-5 rounded-full border-2 border-gray-400
                    transition-all duration-200
                    peer-checked:bg-blue-600
                    peer-checked:border-blue-600">
                </div>

                <span class="text-gray-700 font-medium">
                    {{ $status->description }}
                </span>

            </label>
        @endforeach
    </div>
</div>
