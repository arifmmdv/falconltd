@php
    $contact = \App\Models\Page::find(9);
    $blocks = json_decode(json_encode($contact->content));
    foreach ($blocks as $block) {
        if ($block->type === 'contacts') {
            $contacts = json_decode(json_encode($block->data), true); // Convert to associative array
            break; // Assuming you want to stop the loop after finding the 'contacts' block
        }
    }

    $socials = \App\Models\Social::all();
    $quickLinks = \App\Models\Menu::where('slug','quick-links')->firstOrFail();
    $services = \App\Models\Menu::where('slug','services')->firstOrFail();
@endphp
<footer class="main-footer">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <!--big column-->
                <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="/{{app()->getLocale()}}">
                                        <img src="/assets/images/footer-logo.svg" alt="Tecnocon" />
                                    </a>
                                </div>
                                <div class="text">{{ __('footer-about') }}</div>
                            </div>
                        </div>

                        @if(count($quickLinks->items) > 0)
                            <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                                <div class="footer-widget links-widget">
                                    <h2>{{ __('quick-links') }}</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            @foreach($quickLinks->items as $item)
                                                <li>
                                                    <a href="/{{app()->getLocale()}}{{$item->slug}}">
                                                        {{ $translator->translate($item,'title') }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                <!--big column-->
                <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">

                        @if(count($services->items) > 0)
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-widget links-widget">
                                <h2>{{ __('services') }}</h2>
                                <div class="widget-content">
                                    <ul class="list">
                                        @foreach($services->items as $item)
                                            <li>
                                                <a href="/{{app()->getLocale()}}{{$item->slug}}">
                                                    {{ $translator->translate($item,'title') }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(count($socials) > 0)
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-widget info-widget">
                                <h2>{{ __('get-in-touch') }}</h2>
                                <div class="widget-content">
                                    @isset($contacts['phone'][0])
                                        <div class="number">
                                            <a href="tel:{{$contacts['phone'][0]['value']}}">
                                                {{$contacts['phone'][0]['value']}}
                                            </a>
                                        </div>
                                    @endisset
                                    <div class="text">
                                        @isset($contacts['address'])
                                            {{ $translator->translate($contacts,'address') }}
                                        @endisset
                                        <br>
                                        @isset($contacts['email'][0])
                                            <a href="mailto:{{$contacts['email'][0]['value']}}">
                                                {{$contacts['email'][0]['value']}}
                                            </a>
                                        @endisset
                                    </div>
                                    <ul class="social-icon-one">
                                        @foreach($socials as $social)
                                            <li>
                                                <a href="{{$social->link}}" target="_blank" title="{{$social->title}}">
                                                    <span class="{{$social->icon}}"></span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="clearfix">
                <div class="pull-left">
                    <div class="copyright">Copyright &copy; {{ date('Y') }}. {{ __('copyright') }}</div>
                </div>
                <div class="pull-right">
                    <div class="created">
                        Created by
                        <a
                            href="https://arifmammadov.com/"
                            target="_blank"
                            style="color: #ffd302"
                        >
                            MMDV
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</footer>
