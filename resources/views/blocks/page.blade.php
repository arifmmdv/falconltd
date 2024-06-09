@foreach($pages as $page)
    <section id="{{$page->slug}}" class="section">
        <div class="py-48 px-8">
            @include('blocks.blocks')
        </div>
    </section>
@endforeach
