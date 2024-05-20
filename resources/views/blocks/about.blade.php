<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                @if(!empty($block['title']))
                    <h2>{{ $translator->translate($block,'title') }}</h2>
                @endif
                @if(!empty($block['content']))
                    <div class="text">
                        {!! $translator->translate($block,'content') !!}
                    </div>
                @endif
                @if(!empty($block['bold_content']))
                    <div class="bold-text">
                        {!! $translator->translate($block,'bold_content') !!}
                    </div>
                @endif
                </div>
            </div>

            <!--Image Column-->
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
                <div class="row clearfix">
                @if(!empty($block['image_1']))
                    <div class="column col-md-6 col-sm-6 col-xs-12">
                        <div class="image">
                            <img src="/uploads/{{$block['image_1']}}" alt="" />
                        </div>
                    </div>
                @endif
                @if(!empty($block['image_2']))
                    <div class="column col-md-6 col-sm-6 col-xs-12">
                        <div class="image">
                            <img src="/uploads/{{$block['image_2']}}" alt="" />
                        </div>
                    </div>
                @endif
                </div>
            </div>

        </div>
    </div>
</section>
