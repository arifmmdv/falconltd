<section class="aproach-section">
    <div class="auto-container">
        <div class="row clearfix">
            @if(!empty($block['title']))
                <div class="title-column col-md-4 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <h2>{{ $translator->translate($block,'title') }}</h2>
                        <br>
                        <div class="text">
                            {!! $translator->translate($block,'content') !!}
                        </div>
                    </div>
                </div>
            @endif
            <div class="content-column col-md-8 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <ul class="accordion-box style-three">
                        @foreach($block['value'] as $value)
                            <li class="accordion block @if($loop->first) active-block @endif">
                                <div class="acc-btn  @if($loop->first) active @endif">
                                    <div class="icon-outer">
                                        <span class="icon icon-plus fa fa-plus"></span>
                                        <span class="icon icon-minus fa fa-minus"></span>
                                    </div>
                                    {{ $translator->translate($value,'title') }}
                                </div>
                                <div class="acc-content @if($loop->first) current @endif">
                                    <div class="content">
                                        <div class="text">
                                            {!! $translator->translate($value,'content') !!}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
