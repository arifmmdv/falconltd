<section class="company-section">
    <div class="auto-container">
        <div class="row clearfix">
            @if(!empty($block['image']))
                <div class="image-column col-md-4 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="image">
                            <img src="/uploads/{{$block['image']}}" alt="Tecnocon" />
                        </div>
                    </div>
                </div>
            @endif
            <div class="content-column @if(!empty($block['image'])) col-md-8 @else col-md-12 @endif col-sm-12 col-xs-12">
                <div class="inner-column">
                    @if(!empty($block['title']))
                        <div class="sec-title">
                            <h2>{{ $translator->translate($block,'title') }}</h2>
                        </div>
                    @endif
                    @if(!empty($block['bold_content']))
                        <div class="bold-text">
                            {!! $translator->translate($block,'bold_content') !!}
                        </div>
                    @endif
                    @if(!empty($block['content']))
                        <div class="text">
                            {!! $translator->translate($block,'content') !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
