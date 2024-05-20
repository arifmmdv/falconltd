@if(!empty($page->content))
    @foreach (json_decode(json_encode($page->content)) as $block)
        @include("blocks.$block->type", ['block' => json_decode(json_encode($block->data), true)])
    @endforeach
@endif
