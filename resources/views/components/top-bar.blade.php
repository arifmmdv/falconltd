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
@endphp
<div class="header-top">
    <div class="auto-container">
        <div class="inner-container clearfix">

            <!--Top Left-->
            <div class="top-left">
                <ul class="links clearfix">
                    @isset($contacts['phone'][0])
                        <li><a href="#">{{ $contacts['phone'][0]['value']}}</a></li>
                    @endisset
                    @isset($contacts['email'][0])
                        <li><a href="#"><span class="icon flaticon-note-1"></span>{{$contacts['email'][0]['value']}}</a></li>
                    @endisset
                    @isset($contacts['address'])
                        <li><a href="#"><span class="icon flaticon-pin"></span>{{ $translator->translate($contacts,'address') }}</a></li>
                    @endisset
                </ul>
            </div>

            @if(count($socials) > 0)
            <div class="top-right clearfix">
                <!--social-icon-->
                <div class="social-icon">
                    <ul class="clearfix">
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
            @endif
        </div>

    </div>
</div>
