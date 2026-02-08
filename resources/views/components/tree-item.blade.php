@props(['center' => null])

<div {{ $attributes->class(['flex w-full justify-center']) }} x-data="{ open: false }">
    @if ($center)
        <div x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false" class="relative">
            {{-- {{ dd($center) }} --}}
            <!-- Trigger Element -->
            <div x-ref="toggle" class="relative">
                <img src="{{ $center->user->avatar }}"
                     {{-- <img src="{{ asset('images/avatar.png') }}" --}}
                     class="h-16 w-16 border-4 rounded-full
                {{ $center->status->is(\App\Enums\UserStatus::Active()) ? 'border-green-500' : 'border-red-500' }}"
                     alt=""/>
            </div>

            <!-- Popover Content -->
            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2" x-anchor.top="$refs.toggle"
                 class="mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-[200] {{ $center->status->is(\App\Enums\UserStatus::Active()) ? 'border-green-500' : 'border-red-500' }}">
                <div class="p-4 text-left text-sm">
                    <div class="text">Name : {{ $center->user->name }}</div>
                    @if($center->status->is(\App\Enums\UserStatus::Active))
                        <div class="text">Package
                            : {{ optional(optional($center->addPVs->sortDesc()->first())->package)->name }}</div>
                    @endif
                    <div class="text">Rank : {{ $center->rank->description }}</div>
                    <div class="text">Reference Id : {{ $center->referrer->center_id ?? 'N/A' }}</div>
                    <div class="text">User ID : {{ $center->user_id }}</div>
                    <div class="text">Center ID : {{ $center->center_id }}</div>
                    <div class="text">Center : {{ $center->center_count }}</div>
                    <div class="text">Total Matching : {{ $center->matching }}</div>
                    <div class="text">Left Carry : {{ $center->left_carry }}</div>
                    <div class="text">Right Carry : {{ $center->right_carry }}</div>
                    {{-- <div class="text">Left PV : {{ $center->left_carry + $center->matching_uncapped }}</div>
                    <div class="text">Right PV : {{ $center->right_carry + $center->matching_uncapped }}</div> --}}
                    <div class="text">PSM Amount :
                        {{ isset($center->addPSM->psm_amount) ? '(Active)' : '(In Active)' }} </div>
                </div>
            </div>
        </div>
    @else
        <div class="border border-black size-16 rounded-full"></div>
    @endif
</div>
