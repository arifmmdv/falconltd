<div class="flex flex-col max-w-xl">
    <h2 class="text-gray-800 text-3xl font-semibold mb-5">{{ $translator->translate($block,'title') }}</h2>
    @if(!empty($block['content']))
        <div class="text-gray-900 mb-6">
            {!! $translator->translate($block,'content') !!}
        </div>
    @endif
    <div class="flex flex-col gap-4">
        @foreach($block['value'] as $value)
        <div class="flex gap-4 max-sm:flex-col">
            @if(!empty($value['icon']))
                <div>
                    {!! $value['icon'] !!}
                </div>
            @endif
            <div class="">
                @if(!empty($value['title']))
                    <p class="text-gray-800 text-lg mb-1 font-semibold">{{ $translator->translate($value,'title') }}</p>
                @endif
                @if(!empty($value['content']))
                <div class="text-gray-600">
                    {!! $translator->translate($value,'content') !!}
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
