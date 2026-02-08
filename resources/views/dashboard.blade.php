<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- @if (Auth::user()->status->value === \App\Enums\UserStatus::Inactive)
        <div class="w-full bg-yellow-400 text-black text-sm font-semibold px-2 py-1 rounded">
            Your Account Inactive. Package Purchase To Active Account: <a class="underline"
                href="{{ route('package-order.create') }}">Click
                Here</a>
        </div>
    @endif --}}

    @if ($news = business_setting('news'))
        <div class="w-full p-4">
            <div class="w-full bg-white rounded py-2">
                <marquee behavior="" direction="">{{ $news }}</marquee>
            </div>
        </div>
    @endif

    <div class="w-full flex flex-wrap">
        @foreach ($cards as $card)         

            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                <div class="bg-[#fef0e8] rounded-lg shadow text-[#f26e21] p-5">
                    <div class="text-sm font-medium uppercase ">
                        {{ $card->title }}
                    </div>
                    <div class="text-3xl font-extrabold mt-2 text-end">
                        {{ $card->value }}
                    </div>
                    {{-- <div class="mt-4 divide-y divide-white/20">
                        @foreach ($card->kv as $k => $v)
                            <div class="flex justify-between items-center py-2">
                                <span class="text-sm ">{{ $k }}</span>
                                <span class="text-sm font-semibold">{{ $v }}</span>
                            </div>
                        @endforeach
                    </div> --}}
                </div>
            </div>
        @endforeach
    </div>    
</x-app-layout>
