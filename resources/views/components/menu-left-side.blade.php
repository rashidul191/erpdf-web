<ul class="space-y-2 bg-white p-4 ">

    <li>
        <a href="{{ route('admin.menu.index') }}" class="block px-4 py-2 rounded-md text-sm font-medium transition duration-200
               hover:bg-blue-500 hover:text-white
               {{ request()->routeIs('admin.menu.index') ? 'bg-blue-500 text-white' : 'text-gray-700' }}">
            Main Menu
        </a>
    </li>

    <li>
        <a href="{{ route('admin.sub-menu.index') }}" class="block px-4 py-2 rounded-md text-sm font-medium transition duration-200
               hover:bg-blue-500 hover:text-white
               {{ request()->routeIs('admin.sub-menu.index') ? 'bg-blue-500 text-white' : 'text-gray-700' }}">
            Sub Menu
        </a>
    </li>

    <li>
        <a href="{{ route('admin.sub-of-sub-menu.index') }}" class="block px-4 py-2 rounded-md text-sm font-medium transition duration-200
               hover:bg-blue-500 hover:text-white
               {{ request()->routeIs('admin.sub-of-sub-menu.index') ? 'bg-blue-500 text-white' : 'text-gray-700' }}">
            Sub Of Sub Menu
        </a>
    </li>

</ul>
