@props(['cartItems'])
@php
    $subtotal = 0;
@endphp
@if (count($cartItems) > 0)
    <div class="space-y-2 max-h-60 overflow-y-auto">
        @foreach ($cartItems as $index => $item)
            <div class="flex items-center justify-between cart-item" data-index="{{ $index }}">
                <img src="{{ $item['image'] }}" class="w-16 h-16 rounded" alt="image">
                <div class="flex-1 ml-3">
                    <h4 class="font-bold text-gray-700">{{ $item['name'] }}</h4>
                    <p class="text-[#f26e21]">TK {{ number_format($item['price'], 2) }}</p>
                    <div class="flex items-center space-x-2">
                        <button class="qty-btn px-2 bg-gray-200 rounded text-sm" data-action="decrease"
                            data-index="{{ $index }}">-</button>
                        <span class="quantity text-gray-800">{{ $item['quantity'] }}</span>
                        <button class="qty-btn px-2 bg-gray-200 rounded text-sm" data-action="increase"
                            data-index="{{ $index }}">+</button>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold text-gray-700 total-price">
                        TK {{ number_format($item['price'] * $item['quantity'], 2) }}
                    </p>

                    <a href="{{ route('cart.product-remove', $index) }}"
                        class="text-red-600 hover:underline text-xs flex justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </a>
                </div>
            </div>
            @php $subtotal += $item['price'] * $item['quantity']; @endphp
        @endforeach
    </div>
    <div class="border-t pt-2">
        <p class="text-center font-semibold">Subtotal: <span class="subtotal">TK
                {{ number_format($subtotal, 2) }}</span></p>
    </div>
    <div class="flex justify-between space-x-2">
        <a href="{{ route('view-cart.index') }}"
            class="w-1/2 text-center py-2 bg-gray-200 rounded hover:bg-gray-300 font-bold">View
            Cart</a>
        <a href="{{ route('checkout.index') }}"
            class="w-1/2 text-center py-2 bg-[#f26e21] text-white rounded font-bold">Checkout</a>
    </div>
@else
    <div class="text-center py-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-12 text-gray-400 mb-3" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7H18m-6-7v7" />
        </svg>
        <p class="text-red-600">Your cart is empty</p>
    </div>
@endif
