@props(['menus' => []])
@foreach ($menus as $menu)

    @php
        $isCustom = $menu->is_custom == \App\Enums\IsAgreeStatus::Yes();
        $slug = $isCustom ? $menu->slug : ($menu->page->slug ?? '');
        $title = $isCustom ? $menu->name : ($menu->page->title ?? '');
    @endphp
    <li
        class="{{ request()->routeIs('page.index') && request()->route('slug') == $slug ? 'active' : ''   }} {{ $menu->subMenus->isNotEmpty() ? 'dropdown' : '' }}">

        <a href="{{ route('page.index', $slug) }}">
            {{ $title }}
        </a>

        @if($menu->subMenus->isNotEmpty())
            <ul>
                @foreach ($menu->subMenus as $subMenu)
                    @php
                        $isCustom = $subMenu->is_custom == \App\Enums\IsAgreeStatus::Yes();
                        $subSlug = $isCustom ? $subMenu->slug : ($subMenu->page->slug ?? '');
                        $subTitle = $isCustom ? $subMenu->name : ($subMenu->page->title ?? '');
                    @endphp

                    <li class="{{ $subMenu->subOfSubMenus->isNotEmpty() ? 'submenu' : ''  }} ">
                        <a href="{{ route('page.index', $subSlug) }}">
                            {{ $subTitle }}
                        </a>
                        @if($subMenu->subOfSubMenus->isNotEmpty())
                            <ul class="subofsubmenu">
                                @foreach ($subMenu->subOfSubMenus as $subOfSubMenu)
                                    @php
                                        $isCustom = $subOfSubMenu->is_custom == \App\Enums\IsAgreeStatus::Yes();
                                        $subOfSubSlug = $isCustom ? $subOfSubMenu->slug : ($subOfSubMenu->page->slug ?? '');
                                        $subOfSubTitle = $isCustom ? $subOfSubMenu->name : ($subOfSubMenu->page->title ?? '');
                                    @endphp

                                    <li>
                                        <a href="{{ route('page.index', $subOfSubSlug) }}">
                                            {{ $subOfSubTitle }}
                                        </a>
                                    </li>

                                @endforeach

                            </ul>
                        @endif

                    </li>

                @endforeach

            </ul>
        @endif

    </li>
@endforeach
