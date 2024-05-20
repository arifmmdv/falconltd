<section class="we-do-section grey-bg">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title">
            @if(!empty($block['title']))
                <h2>{{ $translator->translate($block,'title') }}</h2>
            @endif
            @if(!empty($block['sub_title']))
                <div class="text">{{ $translator->translate($block,'sub_title') }}</div>
            @endif
        </div>

        <div class="row clearfix">
            @foreach(\App\Models\Page::find(16)->children as $service)
            <div class="services-block col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="/{{app()->getLocale()}}/xidmetlerimiz/{{$service->slug}}">
                            <img src="/uploads/{{$service->image}}" alt="{{$service->title}}" />
                        </a>
                    </div>
                    <div class="lower-content">
                        <h3>
                            <a href="/{{app()->getLocale()}}/xidmetlerimiz/{{$service->slug}}">
                                {{$service->title}}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
