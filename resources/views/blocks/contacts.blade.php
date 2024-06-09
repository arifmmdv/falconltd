<h2 class="text-gray-800 text-3xl font-semibold mb-5">{{ $translator->translate($page,'title') }}</h2>
<div class="flex flex-col gap-4">

    <div class="flex gap-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
            <path d="M15 7a2 2 0 0 1 2 2" />
            <path d="M15 3a6 6 0 0 1 6 6" />
        </svg>
        <div class="">
            @if(!empty($block['phone_title']))
                <p class="text-gray-800 text-lg mb-1 font-semibold">{{ $translator->translate($block,'phone_title') }}</p>
            @endif
            @foreach($block['phone'] as $phone)
                <a href="tel:{{$phone['value']}}" class="block text-gray-600">{{$phone['value']}}</a>
            @endforeach
        </div>
    </div>

    <div class="flex gap-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
            <path d="M3 7l9 6l9 -6" />
        </svg>
        <div class="">
            @if(!empty($block['email_title']))
                <p class="text-gray-800 text-lg mb-1 font-semibold">{{ $translator->translate($block,'email_title') }}</p>
            @endif
            @foreach($block['email'] as $email)
                <a href="mailto:{{$email['value']}}" class="block text-gray-600">{{$email['value']}}</a>
            @endforeach
        </div>
    </div>

    <div class="flex gap-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
        </svg>
        <div class="">
            @if(!empty($block['address_title']))
                <p class="text-gray-800 text-lg mb-1 font-semibold">{{ $translator->translate($block,'address_title') }}</p>
            @endif
            @if(!empty($block['address']))
                <p class="text-gray-600">{{ $translator->translate($block,'address') }}</p>
            @endif
        </div>
    </div>
</div>
