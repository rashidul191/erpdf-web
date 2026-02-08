 @props(['product'])

 @php
     $price = $product->display_price;
 @endphp

 <div
     class="h-[260px] md:h-[400px] bg-white group p-2 sm:p-3 md:p-5 m-1 md:m-2 relative border border-[#f26e21] rounded">

     @if ($product->discount_percent > 0)
         <span class="absolute top-2 left-2 z-10 bg-[#37b911] text-white text-xs md:text-sm rounded px-1">
             {{ $product->discount_percent }}%
         </span>
     @endif

     <div class="w-[100px] sm:w-full md:w-[230px] h-[100px] sm:h-[140px] md:h-[230px] mx-auto">
         <a href="{{ route('products.show', [$product->id, $product->slug]) }}">
             <img src="{{ $product->image }}" alt="{!! $product->name !!}" class="w-full h-full" />
         </a>
     </div>

     <div class="product-info mt-2">
         <div>
             <div class="hidden md:block">
                 <h3 class="text-sm sm:text-md md:text-xl font-semibold text-[#454457]">
                     <a href="{{ route('products.show', [$product->id, $product->slug]) }}">
                         {!! \Str::limit($product->name, 22) !!}
                     </a>
                 </h3>
             </div>
             <div class="md:hidden">
                 <h3 class="text-sm sm:text-md md:text-xl font-semibold text-[#454457]">
                     <a href="{{ route('products.show', [$product->id, $product->slug]) }}">
                         {!! \Str::limit($product->name, 18) !!}
                     </a>
                 </h3>
             </div>
         </div>

         <div class="">
             <div>
                 <p class=" my-1 text-start">
                     @if ($price['hasSale'])
                         <span class="text-[#a0a0a0] line-through block text-xs md:text-md">
                             TK{{ $price['regular'] }}
                         </span>
                         <span class="text-[#37b911] block text-xs md:text-lg font-semibold">
                             TK{{ $price['sale'] }}
                         </span>
                     @else
                         <span class="text-[#37b911] text-xs md:text-lg font-semibold">
                             TK{{ $price['regular'] }}
                         </span>
                     @endif
                 </p>
             </div>
             <div>
                 @if ($product->is_variation->value === \App\Enums\IsAgreeStatus::Yes)
                     <div class="mt-4 flex items-center justify-between">
                         <a href="{{ route('products.show', [$product->id, $product->slug]) }}"
                             class="ml-2 bg-[#f26e21] text-white text-sm px-3 py-1 rounded font-semibold hover:bg-orange-600 transition">
                             Select Option
                         </a>

                     </div>
                 @elseif ($product->status->value === \App\Enums\ProductStatus::InStock)
                     <div class="mt-4 w-full md:flex items-center justify-between md:space-x-2">
                         {{-- <a href="{{ route('add-cart', $product->id) }}"
                             class="ml-2 bg-[#f26e21] text-white text-sm px-3 py-1 rounded font-semibold hover:bg-orange-600 transition">
                             Add To Cart
                         </a> --}}

                         <form action="{{ route('add-to-cart') }}" method="post">
                             @csrf
                             <input type="hidden" name="product_id" value="{{ $product->id }}">
                             <input type="hidden" name="quantity" value="1">
                             <input type="hidden" name="status"
                                 value="{{ \App\Enums\ProductAddCartStatus::AddToCart }}">
                             <button type="submit"
                                 class="w-full bg-[#f26e21] text-white text-xs md:text-sm px-3 py-1 rounded font-semibold hover:bg-orange-600 transition">Add
                                 To Cart</button>
                         </form>

                         <form action="{{ route('add-to-cart') }}" method="post" class="mt-2 md:mt-0">
                             @csrf
                             <input type="hidden" name="product_id" value="{{ $product->id }}">
                             <input type="hidden" name="quantity" value="1">
                             <input type="hidden" name="status"
                                 value="{{ \App\Enums\ProductAddCartStatus::BuyNow }}">
                             <button type="submit"
                                 class="w-full bg-[#f26e21] text-white text-xs md:text-sm px-3 py-1 rounded font-semibold hover:bg-orange-600 transition">
                                 Buy Now</button>
                         </form>
                     </div>
                 @else
                     <div class="text-center mt-4">
                         <span class="text-xs sm:text-sm md:text-lg font-bold text-red-500">Our Of Stock</span>
                     </div>
                 @endif
             </div>
         </div>
     </div>
 </div>
