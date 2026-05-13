@props(['menus' => []])
@foreach ($menus as $menu)

    @php
        $isCustom = $menu->is_custom->value == \App\Enums\IsAgreeStatus::Yes;
        $title = $isCustom ? $menu->name : ($menu->page->title ?? '');
    @endphp
    <li class=" {{ $menu->subMenus->isNotEmpty() ? 'dropdown' : '' }}">
        {{-- class="{{ request()->routeIs('page.index') && request()->route('slug') == pageUrl($menu) ? 'active' : '' }} {{
        $menu->subMenus->isNotEmpty() ? 'dropdown' : '' }}"> --}}

        <a href="{{ pageUrl($menu)  }}">
            {{ $title }}
        </a>

        @if($menu->subMenus->isNotEmpty())
            <ul>
                @foreach ($menu->subMenus as $subMenu)
                    @php
                        $isCustom = $subMenu->is_custom == \App\Enums\IsAgreeStatus::Yes();
                        $subTitle = $isCustom ? $subMenu->name : ($subMenu->page->title ?? '');
                    @endphp

                    <li class="{{ $subMenu->subOfSubMenus->isNotEmpty() ? 'submenu' : ''  }} ">
                        <a href="{{ pageUrl($subMenu)  }}">
                            {{ $subTitle }}
                        </a>
                        @if($subMenu->subOfSubMenus->isNotEmpty())
                            <ul class="subofsubmenu">
                                @foreach ($subMenu->subOfSubMenus as $subOfSubMenu)
                                    @php
                                        $isCustom = $subOfSubMenu->is_custom == \App\Enums\IsAgreeStatus::Yes();
                                        $subOfSubTitle = $isCustom ? $subOfSubMenu->name : ($subOfSubMenu->page->title ?? '');
                                    @endphp

                                    <li>
                                        <a href="{{ pageUrl($subOfSubMenu) }}">
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
