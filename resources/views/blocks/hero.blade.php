<h1 class="text-gray-700 text-5xl font-semibold mb-16 mt-32">
    @if(!empty($block['first_line']))
        <span class="block mb-2">{{ $translator->translate($block,'first_line') }}</span>
    @endif
    @if(!empty($block['second_line']))
        <span class="text-4xl">{{ $translator->translate($block,'second_line') }}</span>
    @endif
</h1>
