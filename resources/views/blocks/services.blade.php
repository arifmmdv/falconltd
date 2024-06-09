<h2 class="text-gray-800 text-3xl font-semibold mb-5">{{ $translator->translate($block,'title') }}</h2>

<div class="flex flex-col gap-6">
    @foreach($block['service'] as $service)
        <div class="flex flex-col gap-4">
            @if(!empty($service['title']))
                <h3 class="text-xl font-medium">{{ $translator->translate($service,'title') }}</h3>
            @endif
            @if(!empty($service['content']))
                <div class="flex flex-col gap-4 services">
                    {!!  $translator->translate($service,'content') !!}
                </div>
            @endif
        </div>
    @endforeach
</div>
