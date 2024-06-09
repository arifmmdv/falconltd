@foreach($pages as $page)
    <section id="{{$page->slug}}" class="section">
        <div class="py-48 px-8 max-sm:py-36">
            <div class="max-w-2xl max-lg:bg-white/70 max-lg:px-8 max-lg:py-12 max-lg:rounded-lg backdrop-blur-md">
                @include('blocks.blocks')
            </div>
        </div>
    </section>
@endforeach
