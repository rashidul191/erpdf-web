 <div class="hero_slider_section ">
     <div class="hero_slider autoplay">
         @foreach ($sliders as $index => $item)
             <div class="w-full h-auto md:h-[500px]">
                 <a href="{{ $item->page_link ? url($item->page_link) : 'javascript:void(0)' }}">
                     <img class="w-full h-full" src="{{ $item->image }}" alt="">
                 </a>
             </div>
         @endforeach
     </div>
 </div>
