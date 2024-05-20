@php
    $languages = [
        "en" => __('english'),
        "tr" => __('turkish'),
    ]
@endphp
<p>Header</p>
<ul class="language-options">
    <li><a href="#">{{ app()->getLocale() }}</a></li>
    @foreach($languages as $locale => $language)
        @if($locale !== app()->getLocale())
            @php
                $pathParts = explode("/", request()->path());
                $pathParts[0] = $locale;
                $newPath = implode("/", $pathParts);
            @endphp
            <li>
                <a href="/{{ $newPath }}">{{ $locale }}</a>
            </li>
        @endif
    @endforeach
</ul>
