<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($cards as $card)
                <div class="h-[120px] flex justify-between bg-[#18a79a] rounded shadow text-white p-5">
                    <div>
                        <h2 class="text-lg font-bold uppercase"> {{ $card->title }}</h2>
                        <div class="mt-3 divide-y divide-white/20">
                            @foreach ($card->kv as $k => $v)
                                <div class="py-2">
                                    <span class="text-sm capitalize">{{ $k }}</span>
                                    <span class="text-sm font-semibold"> : TK {{ number_format($v) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold"> {{ $card->value }}</h2>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-app-layout>
