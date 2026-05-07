     <div class="team_section py-12 md:py-[60px] bg-gray-50">
         <div class="container mx-auto">
             <div class="section_title text-center mb-6">
                 <h2
                     class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-transparent bg-clip-text relative inline-block">
                     Meet Our Team
                     <span class="block mt-2 w-24 h-1 bg-pink-500 mx-auto rounded-full shadow-md shadow-pink-400"></span>
                 </h2>
             </div>

             <div class="team_slider responsive">
                 @foreach ($teams as $index => $item)
                     <div
                         class="relative group overflow-hidden rounded-3xl shadow-lg transition-shadow duration-500 bg-white/5 backdrop-blur m-2 md:m-5">

                         <!-- Image with Zoom on Hover -->
                         <div class="h-64 md:h-80 overflow-hidden clip-diagonal relative">
                             <div class="w-full h-full bg-cover bg-center transform transition-transform duration-500 group-hover:scale-110"
                                 style="background-image: url('{{ $item->image }}');">
                             </div>
                         </div>

                         <!-- Info Floating Panel with Slide-up -->
                         <div
                             class="p-2 md:px-6 md:py-3 relative z-10 -mt-14 bg-white rounded-2xl shadow-lg md:mx-4 transition-all duration-500 transform group-hover:-translate-y-2">
                             <h3 class="text-sm md:text-xl font-bold text-gray-800">{{ $item->name }}</h3>
                             <p class="text-sm text-gray-500">{{ $item->designation }}</p>

                             <!-- Social Icons Fade In -->
                             <div
                                 class="flex space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">

                                 @if ($item->fb_link)
                                     <!-- Facebook -->
                                     <a target="_blank" href="{{ $item->fb_link }}"
                                         class="text-2xl text-blue-600 mt-1 transition-transform transform hover:scale-110">
                                         <i class="fab fa-facebook-square"></i>
                                     </a>
                                 @endif
                                 @if ($item->youtube_link)
                                     <!-- youtube -->
                                     <a target="_blank" href="{{ $item->youtube_link }}"
                                         class="text-2xl text-red-600 mt-1 transition-transform transform hover:scale-110">
                                         <i class="fab fa-youtube"></i>
                                     </a>
                                 @endif
                             </div>

                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
     </div>
     <style>
         .clip-diagonal {
             clip-path: polygon(0 0, 100% 0, 100% 75%, 0% 100%);
         }
     </style>
