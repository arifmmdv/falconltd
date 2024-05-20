<section class="page-title" style="background-image:url(/assets/images/background/4.jpg);">
    <div class="auto-container">
        <h1>{{ $translator->translate($block,'title') }}</h1>
    </div>

</section>

<div class="page-info">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb pull-left">
                <li><a href="/">{{ __('home') }}</a></li>
                <li>
                    {{ $translator->translate($block,'title') }}
                </li>
            </ul>
            <div class="text pull-right">{{ __('engineering-tomorrow') }}</div>
        </div>
    </div>
</div>
