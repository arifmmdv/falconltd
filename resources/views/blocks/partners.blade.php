<section class="clients-section">
    <div class="auto-container">
        <div class="sponsors-outer">
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @foreach($block->partner as $partner)
                    <li class="slide-item">
                        <figure class="image-box">
                            <a href="{{$partner->link}}">
                                <img src="/uploads/{{$partner->logo}}" alt="{{$partner->title}}" />
                            </a>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
