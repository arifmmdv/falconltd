<section class="fluid-section-one @if($block['dark']) alternate @endif">
    <div class="outer-container clearfix">
        @if(!empty($block['image']))
        <div class="image-column" style="background-image:url(/uploads/{{$block['image']}});">
            <figure class="image-box"><img src="/uploads/{{$block['image']}}" alt="Tecnocon"></figure>
        </div>
        @endif
        <div class="content-column">
            <div class="inner-column">
                @if(!empty($block['title']))
                    <div class="sec-title @if($block['dark']) light @endif">
                        <h2>{{ $translator->translate($block,'title') }}</h2>
                    </div>
                @endif

                @if(!empty($block['content']))
                    <div class="text">
                        {!! $translator->translate($block,'content') !!}
                    </div>
                @endif
{{--                <ul class="icons-list">--}}
{{--                    <li><span class="icon flaticon-target"></span>Dedicated <br> Team</li>--}}
{{--                    <li><span class="icon flaticon-group"></span>Best <br> Engineers</li>--}}
{{--                    <li><span class="icon flaticon-technology-2"></span>24/7 <br> Supports</li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
</section>
