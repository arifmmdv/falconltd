<section class="contact-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-md-4">
                <div class="contact">
                    <span class="icon flaticon-map-marker"></span>
                    <div class="contact-title">
                        <h3>{{ $translator->translate($block,'address_title') }}</h3>
                    </div>
                    <div class="text">{{ $translator->translate($block,'address') }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact">
                    <span class="icon flaticon-telephone-handle-silhouette"></span>
                    <div class="contact-title">
                        <h3>{{ $translator->translate($block,'phone_title') }}</h3>
                    </div>
                    @foreach($block['phone'] as $phone)
                        <div class="text">
                            @if (!empty($phone['title']))
                                {{ $translator->translate($phone,'title') }}:
                            @endif
                            @if (!empty($phone['value']))
                                <a href="tel:{{$phone['value']}}" target="_blank">{{$phone['value']}}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact">
                    <span class="icon flaticon-sent-mail"></span>
                    <div class="contact-title">
                        <h3>{{ $translator->translate($block,'email_title') }}</h3>
                    </div>
                    @foreach($block['email'] as $email)
                        <div class="text">
                            @if (!empty($email['title']))
                                {{ $translator->translate($email,'title') }}:
                            @endif
                            @if (!empty($email['value']))
                                <a href="mailto:{{$email['value']}}" target="_blank">
                                    {{ $email['value'] }}
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
