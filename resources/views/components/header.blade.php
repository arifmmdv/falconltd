@php
    $languages = ['en','tr'];
@endphp
<div class="fixed w-full p-4 z-30">
    <div class="menu rounded-lg px-8 py-2">
        <div class="flex justify-between align-middle">
            <div class="logo">
                @include('.components.logo')
            </div>
            <ul class="flex align-middle gap-4 max-lg:hidden">
                @foreach($pages as $key => $page)
                    <li class="flex flex-col justify-center">
                        <a href="#{{$page->slug}}" class="menu-item block py-1.5 px-4 rounded transition duration-300 border border-white/70 shadow-md text-gray-800 bg-white/70 backdrop-blur-md hover:border-primary">{{ $translator->translate($page,'title') }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="max-lg:hidden">
                <div class="flex gap-4 bg-white/70 py-1.5 px-4 rounded backdrop-blur-md">
                    <a href="/{{app()->getLocale()}}" class="text-primary font-medium uppercase">{{app()->getLocale()}}</a>
                    @foreach($languages as $language)
                        @if($language !== app()->getLocale())
                            <a href="/{{$language}}" class="text-gray-600 font-medium uppercase">{{$language}}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="hidden max-lg:block">
                <button id="mobile-menu-button" class="p-2 text-primary bg-white/70 backdrop-blur-md rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="mobile-menu fixed bg-white/80 backdrop-blur-md z-50 py-8 px-4 flex flex-col justify-end gap-8" id="mobile-menu">
    <button class="absolute mobile-menu-close">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M18 6l-12 12" />
            <path d="M6 6l12 12" />
        </svg>
    </button>
    <ul class="flex flex-col gap-4">
        @foreach($pages as $key => $page)
            <li class="flex flex-col justify-center items-end">
                <a href="#{{$page->slug}}" class="menu-item block py-1.5 px-4 transition duration-300 text-gray-800 hover:border-primary">{{ $translator->translate($page,'title') }}</a>
            </li>
        @endforeach
    </ul>
    <ul class="flex justify-end gap-4 pr-4">
        <a href="/{{app()->getLocale()}}" class="text-primary font-medium uppercase">{{app()->getLocale()}}</a>
        @foreach($languages as $language)
            @if($language !== app()->getLocale())
                <a href="/{{$language}}" class="text-gray-600 font-medium uppercase">{{$language}}</a>
            @endif
        @endforeach
    </ul>
</div>
