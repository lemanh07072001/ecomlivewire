<ul class="pb-2 space-y-2">
    <li>
        <form action="#" method="GET" class="lg:hidden">
            <label for="mobile-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" name="email" id="mobile-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Search">
            </div>
        </form>
    </li>

    @php
        $fullRoute = Route::currentRouteName(); // Get the current route name
        $routeParts = explode('.', $fullRoute);

        $module = isset($routeParts[0]) ? $routeParts[0] : null;
        $action = isset($routeParts[1]) ? $routeParts[1] : null;
        $index = isset($routeParts[2]) ? $routeParts[2] : null;
    @endphp

    @foreach (config('apps.modules.menudata') as $item)
        @if (empty($item['sup-menu']))
            <li>
                <a href="{{ route($item['url']) }}"
                    class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-sky-400 dark:hover:bg-gray-700 {{ request()->routeIs($module . '.*') && $item['url'] === $fullRoute ? 'text-sky-400 ' : '' }}"
                    wire:navigate>
                    {!! $item['icon'] !!}
                    <span class="ml-3" sidebar-toggle-item>{{ $item['titleLabel'] }}</span>
                </a>
            </li>
        @else
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts">
                    {!! $item['icon'] !!}
                    <span class="flex-1 ml-3 text-left whitespace-nowrap"
                        sidebar-toggle-item>{{ $item['titleLabel'] }}</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                @if (!empty($item['sup-menu']))
                    <ul id="dropdown-layouts"
                        class="py-2 space-y-2 {{ request()->routeIs($module . '.*') && $item['name'] === $module ? '' : 'hidden ' }}">
                        @foreach ($item['sup-menu'] as $supItem)
                            <li>
                                <a href="/admin/account"
                                    class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 group dark:text-sky-400 dark:hover:bg-gray-700 {{ request()->routeIs($module . '.' . $action . '.*') ? 'text-sky-400 bg-gray-100' : '' }}"
                                    wire:navigate>{{ $supItem['titleLabel'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endif
    @endforeach

</ul>
