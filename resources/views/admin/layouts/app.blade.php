<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin | {{ $title ?? config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ business_image('meta_icon') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <style>
        .isolate-css,
        .isolate-css::before,
        .isolate-css::after,
        .isolate-css *,
        .isolate-css *::before,
        .isolate-css *::after {
            all: revert;
        }

        .my_table tbody td {
            text-align: center;
            font-size: 14px;

        }

        .my_table tbody td img {
            margin: 0 auto;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="font-sans antialiased text-[0.8125rem]">
    <div class="flex min-h-screen bg-gray-200"
        x-data="{ sidebarOpen: window.innerWidth >= 1024, width: window.innerWidth }"
        x-on:resize.window="width = window.innerWidth; sidebarOpen = window.innerWidth >= 1024"
        x-init="$watch('sidebarOpen', value => document.querySelector('body').classList[value ? 'add' : 'remove']('overflow-hidden'))">
        <sidebar class="bg-slate-800 h-screen w-64 overflow-y-scroll scrollbar-hide fixed z-10 transition duration-300"
            :class="{ '-translate-x-64': !sidebarOpen }">
            <div class="p-4 md:pl-4 flex md:flex-row-reverse justify-between items-center flex-wrap">
                <x-application-logo class="h-10 mx-auto mt-4 mb-4" />
            </div>

            <div class="w-full flex flex-col text-slate-300 nav-links">

                <x-navigation-link :href="route('admin.dashboard')" :text="__('Dashboard')" :icon="icon('dashboard')" />

                <!-- @can('user-read')
                    <x-navigation-link :href="route('admin.user.index')" :text="__('User List')" :icon="icon('users')" />
                @endcan -->

                <x-navigation-link :text="__('Menu Manage')" :icon="icon('room')">
                    <x-navigation-link :href="route('admin.menu.index')" :text="__('Navbar Menu')" />
                    <x-navigation-link :href="route('admin.menu-manage.index')" :text="__('Footer Menu')" />
                </x-navigation-link>

                <x-navigation-link :href="route('admin.page.index')" :text="__('Pages')" :icon="icon('room')" />

                <x-navigation-link :text="__('Home Page')" :icon="icon('home')">
                    <x-navigation-link :href="route('admin.slider.index')" :text="__('Slider')" />
                </x-navigation-link>

                <x-navigation-link :text="__('About Page')" :icon="icon('about')">
                    <x-navigation-link :href="route('admin.about.index')" :text="__('About Section')" />
                    <x-navigation-link :href="route('admin.specialization.index')" :text="__('Our Specialization')" />
                    <x-navigation-link :href="route('admin.services.index')" :text="__('Our Services')" />


                </x-navigation-link>

                <x-navigation-link :text="__('Team')" :icon="icon('about')">
                    <x-navigation-link :href="route('admin.team.index')" :text="__('Team Members')" />
                    <x-navigation-link :href="route('admin.team-categories.index')" :text="__('Team Categories')" />
                </x-navigation-link>

                <x-navigation-link :text="__('News')" :icon="icon('website')">
                    <x-navigation-link :href="route('admin.blog.index')" :text="__('News List')" />
                    <x-navigation-link :href="route('admin.blog-categories.index')" :text="__('Categories')" />
                </x-navigation-link>



                <x-navigation-link :href="route('admin.gallery.index')" :text="__('Gallery')" :icon="icon('gallery')" />
                <x-navigation-link :href="route('admin.faq.index')" :text="__('FAQ')" :icon="icon('message')" />
                {{-- <x-navigation-link :href="route('admin.client-say.index')" :text="__('Client Review')"
                    :icon="icon('review')" /> --}}
                <x-navigation-link :href="route('admin.contact-message.index')" :text="__('Contact Messages')"
                    :icon="icon('message')" />

                <x-navigation-link :text="__('Setting')" :icon="icon('setting')">
                    <x-navigation-link :href="route('admin.basic-info.index')" :text="__('Basic Info')" />
                    <x-navigation-link :href="route('admin.social-links.index')" :text="__('Social Links')" />
                    <!-- <x-navigation-link :href="route('admin.apps.index')" :text="__('Apps')" /> -->
                    {{-- @if (auth()->user()->isA('admin'))
                    <x-navigation-link :href="route('laratrust.roles-assignment.index')" :text="__('Access management')"
                        :class="request()->is('*/permission/*') ? 'active' : ''" />
                    @endif --}}
                    <x-navigation-link :href="route('admin.password-update.create')" :text="__('Update password')" />
                </x-navigation-link>

            </div>
        </sidebar>

        <template x-if="sidebarOpen && width < 1024">
            <div>
                <div @click.slef="sidebarOpen = false"
                    class="absolute z-[1] top-0 bottom-0 right-0 left-0 bg-gray-500 opacity-50"></div>
            </div>
        </template>

        <div class="flex flex-col flex-grow w-full">
            <header class="w-full flex-grow-0">
                <div class="w-full flex justify-between items-center bg-white border-b border-gray-200 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" @click="sidebarOpen = true"
                        class="h-6 w-6 cursor-pointer text-gray-600 lg:hidden" fill="currentColor" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <div class="flex-grow flex justify-end items-center gap-2">
                        <div class="h-5 ml-1 mr-2"></div>
                    </div>
                    <div class="relative" x-data="{ dropped: false }" x-on:click.outside="dropped = false">
                        <div class="flex items-center pl-2 mr-2 cursor-pointer" x-on:click="dropped = !dropped">
                            <a title="Website" href="{{ route('home.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-7">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </a>
                            <div class="text-gray-500 font-semibold mx-1 ml-4">{{ auth()->user()->name }}</div>
                            <svg class="w-3 h-3 fill-current text-gray-400 ml-2" viewBox="0 0 12 12">
                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                            </svg>
                        </div>
                        <div class="w-48 fixed top-16 right-0 bg-white rounded-b shadow" x-show="dropped"
                            x-transition:enter="transition origin-top ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-y-0"
                            x-transition:enter-end="opacity-100 scale-y-100"
                            x-transition:leave="transition origin-top ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-y-100"
                            x-transition:leave-end="opacity-0 scale-y-0">
                            <div class="p-2 cursor-pointer hover:font-semibold">
                                <a href="{{ route('admin.profile-update.create') }}">
                                    {{ __('Profile') }}
                                </a>
                            </div>
                            <div class="p-2 cursor-pointer hover:font-semibold">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <div onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-grow lg:ml-64">
                @if (isset($header) && $header)
                    <div class="p-4 bg-white">
                        {{ $header ?? '' }}
                    </div>
                @endif
                @if (session(\App\Mixin\ResponseMixin::SUCCESS_MESSAGE_SESSION_KEY))
                    <x-alert type="success">{{ session(\App\Mixin\ResponseMixin::SUCCESS_MESSAGE_SESSION_KEY) }}</x-alert>
                @endif
                @if (session(\App\Mixin\ResponseMixin::ERROR_MESSAGE_SESSION_KEY))
                    <x-alert type="error">{{ session(\App\Mixin\ResponseMixin::ERROR_MESSAGE_SESSION_KEY) }}</x-alert>
                @endif
                <div class="p-2 md:p-4">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        window.onload = () => {
            const url = location.href.indexOf('?') > 0 ?
                location.href.substring(0, location.href.indexOf('?')) :
                location.href;
            document.querySelector('.nav-links').querySelectorAll("a").forEach(element => {
                if (element.href === url) {
                    element.classList.add('active')
                }
            })
            document.querySelectorAll("a.active").forEach(element => {
                element.classList.remove('border-transparent')
                element.classList.add('border-teal-400')
                element.dispatchEvent(
                    new CustomEvent("active", {
                        bubbles: true,
                    })
                );
            });
        };
    </script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // সব is-editor textarea select করো
            const editors = document.querySelectorAll('[is-editor="is-editor"]');

            editors.forEach((el) => {
                CKEDITOR.replace(el);
            });

            // versionCheck off
            if (typeof CKEDITOR !== 'undefined') {
                for (var instance in CKEDITOR.instances) {
                    if (CKEDITOR.instances.hasOwnProperty(instance)) {
                        CKEDITOR.instances[instance].config.versionCheck = false;
                    }
                }
            }
        });
    </script>

    <script>
        function idSearch(inputId, resultDivId) {
            const inputEl = document.getElementById(inputId);
            const detailsDiv = document.getElementById(resultDivId);

            if (!inputEl || !detailsDiv) return;

            // Focus করলে div show
            inputEl.addEventListener('focus', function () {
                if (this.value.length < 1) {
                    detailsDiv.innerHTML = `<p class="text-gray-500">Type something to search...</p>`;
                }
                detailsDiv.classList.remove('hidden');
            });

            // টাইপ করলে AJAX সার্চ
            inputEl.addEventListener('input', function () {
                let value = this.value;

                if (value.length < 1) {
                    detailsDiv.innerHTML = `<p class="text-gray-500">Type something to search...</p>`;
                    return;
                }

                fetch(`{{ route('admin.user-search') }}?search_text=${value}`)
                    .then(res => res.json())
                    .then(data => {

                        console.log(data);

                        if (data.success) {
                            let html = '<ul class="list-disc pl-4">';
                            data.data.forEach(user => {
                                html += `
        <li class="mb-2 cursor-pointer hover:bg-gray-100 p-1 rounded"
            onclick="document.getElementById('${inputId}').value='${user.user_id}'">
            <strong>User ID:</strong> ${user.user_id} <br>
            <strong>Name:</strong> ${user.name}
        </li>
    `;
                            });
                            html += '</ul>';
                            detailsDiv.innerHTML = html;
                        } else {
                            detailsDiv.innerHTML = `<p class="text-red-500">${data.message}</p>`;
                        }

                        detailsDiv.classList.remove('hidden');
                    })
                    .catch(err => console.error(err));
            });

            // blur করলে hide
            inputEl.addEventListener('blur', function () {
                setTimeout(() => {
                    detailsDiv.classList.add('hidden');
                }, 200);
            });
        }
    </script>

    {{ $script ?? '' }}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.select2-multiple').select2();
        });
    </script>

    {{ $otherScript ?? '' }}
</body>

</html>
