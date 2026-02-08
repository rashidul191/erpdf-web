<footer class="hidden md:block bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <!-- Brand Info -->
        <div>
            <a href="{{ route('home.index') }}">
                <img src="{{ business_image('logo') }}" alt="Logo" class="w-24 mb-4">
            </a>
            <ul class="space-y-3 text-sm">
                @if (business_setting('phone'))
                    <li class="flex items-start gap-2">
                        <i class="fas fa-phone-alt mt-1 text-[#f26e21]"></i>
                        <a href="tel:{{ business_setting('phone') }}" class="hover:text-white">
                            {{ business_setting('phone') }}
                        </a>
                    </li>
                @endif
                @if (business_setting('email'))
                    <li class="flex items-start gap-2">
                        <i class="fas fa-envelope mt-1 text-[#f26e21]"></i>
                        <a href="mailto:{{ business_setting('email') }}" class="hover:text-white">
                            {{ business_setting('email') }}
                        </a>
                    </li>
                @endif
                @if (business_setting('address'))
                    <li class="flex items-start gap-2">
                        <i class="fas fa-map-marker-alt mt-1 text-[#f26e21]"></i>
                        <span>{{ business_setting('address') }}</span>
                    </li>
                @endif
            </ul>
        </div>          <!-- Shop Links -->
        <div>
            <h4 class="text-white text-lg font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2 text-sm">              
               
                <li><a href="javascript:void(0)" class="hover:text-white">Best Sellers</a></li>
                <li><a href="javascript:void(0)" class="hover:text-white">New Arrivals</a></li>
            </ul>
        </div>

        <!-- Customer Care -->
        <div>
            <h4 class="text-white text-lg font-semibold mb-4">Customer Service</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="javascript:void(0)" class="hover:text-white">FAQs</a></li>
                <li><a href="javascript:void(0)" class="hover:text-white">Contact Us</a></li>
                <li><a href="javascript:void(0)" class="hover:text-white">Return Policy</a></li>
                <li><a href="javascript:void(0)" class="hover:text-white">Privacy Policy</a></li>
            </ul>
        </div>

        <!-- Newsletter & Social -->
        <div>
            <h4 class="text-white text-lg font-semibold mb-4">Stay Updated</h4>
            <form class="flex mb-4">
                <input type="email" placeholder="Your email" required
                    class="w-full px-3 py-2 rounded-l bg-gray-800 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button type="submit" class="bg-[#f26e21] text-white px-4 py-2 rounded-r transition">
                    Subscribe
                </button>
            </form>
            <div class="flex space-x-4 text-xl">
                @if (business_setting('fb_link'))
                    <a target="_blank" href="{{ business_setting('fb_link') }}" class="hover:text-blue-400"><i
                            class="fab fa-facebook"></i></a>
                @endif
                @if (business_setting('twitter_link'))
                    <a target="_blank" href="{{ business_setting('twitter_link') }}" class="hover:text-sky-400"><i
                            class="fab fa-twitter"></i></a>
                @endif
                @if (business_setting('instagram_link'))
                    <a target="_blank" href="{{ business_setting('instagram_link') }}" class="hover:text-pink-500"><i
                            class="fab fa-instagram"></i></a>
                @endif
                @if (business_setting('youtube_link'))
                    <a target="_blank" href="{{ business_setting('youtube_link') }}" class="hover:text-red-500"><i
                            class="fab fa-youtube"></i></a>
                @endif
                @if (business_setting('pinterest_link'))
                    <a target="_blank" href="{{ business_setting('pinterest_link') }}" class="hover:text-red-500">
                        <i class="fab fa-pinterest"></i></a>
                @endif
            </div>

            <div class="pt-3">
                <p class="text-white font-bold mb-3">Download Our Mobile App:</p>

                @php
                    $apkSetting = \App\Models\Admin\BusinessSetting::where('key', 'apps')->first();
                    $apkPath = $apkSetting ? $apkSetting->value : null;
                @endphp

                @if ($apkPath)
                    <div class="flex flex-col sm:flex-row justify-center sm:justify-start gap-3">
                        <a href="{{ Storage::url($apkPath) }}" download
                            class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-3 py-2 rounded max-w-[180px]">
                            <i class="fab fa-google-play mr-2"></i> Download App
                        </a>
                    </div>
                @else
                    <p class="text-gray-400 mt-3 text-sm">No mobile apps available for download at the moment.</p>
                @endif
            </div>

        </div>
    </div>

    <!-- Bottom -->
    <div class="border-t border-gray-700 text-sm text-gray-400 py-4 px-6 text-center">
        &copy; {{ date('Y') }} {{ business_setting('copyright') ?? business_setting('website_name') }}. All rights reserved. |
        Developed by
        <a href="javascript:void(0)" class="text-green-500 hover:underline" target="_blank">
            NexXoom
        </a>
    </div>
</footer>
