<div class="fixed w-full p-4 z-20">
    <div class="menu rounded-lg px-8 py-2 bg-gray-300/20 backdrop-blur-md">
        <div class="flex justify-between align-middle">
            <div class="logo">
                @include('.components.logo')
            </div>
            <div class="flex align-middle gap-4">
                <ul class="flex align-middle gap-4">
                    <li class="flex flex-col justify-center">
                        <a href="#home" class="block py-2 px-5 rounded text-white transition duration-300 bg-primary">Home</a>
                    </li>
                    @foreach($pages as $page)
                        <li class="flex flex-col justify-center">
                            <a href="#{{$page->slug}}" class="block py-2 px-5 rounded text-white transition duration-300 bg-transparent hover:bg-primary/30 hover:text-white">{{ $translator->translate($page,'title') }}</a>
                        </li>
                    @endforeach
                </ul>
                <span class="flex flex-col justify-center">|</span>
                <ul class="flex align-middle gap-2">
                    <li class="flex flex-col justify-center">
                        <a href="#" class="text-primary font-medium">EN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
