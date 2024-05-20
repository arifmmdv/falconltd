<section class="aproach-section">
    <div class="auto-container">
        <div class="row clearfix">
            @if(!empty($block['title']))
                <div class="title-column col-md-4 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <h2>{{ $translator->translate($block,'title') }}</h2>
                    </div>
                </div>
            @endif
            <div class="content-column col-md-8 col-sm-12 col-xs-12">
                <div class="inner-column">
                    @if(!empty($block['bold_content']))
                        <div class="big-text">
                            {{ $translator->translate($block,'bold_content') }}
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
