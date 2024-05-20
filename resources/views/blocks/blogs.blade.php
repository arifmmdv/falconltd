<div class="blog-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach(\App\Models\Page::where('parent_id',7)->orderBy('created_at','desc')->paginate($block['limit']) as $blog)
                <div class="news-block-three col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="/{{app()->getLocale()}}/xeberler/{{$blog->slug}}"><img src="/uploads/{{$blog->image}}" alt="{{$blog->title}}" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box clearfix">
                                <div class="posted-date pull-left">
                                    @php
                                        $carbonDate = \Carbon\Carbon::parse($blog->created_at);
                                        $formattedDate = $carbonDate->format('d M. Y');
                                        echo $formattedDate
                                    @endphp
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="/{{app()->getLocale()}}/xeberler/{{$blog->slug}}">{{$blog->title}}</a></h3>
                                <div class="text">
                                    @php
                                        $blocks = json_decode(json_encode($blog->content));
                                        foreach ($blocks as $bloc) {
                                            if ($bloc->type === 'content') {
                                                $content = $bloc->data;
                                            }
                                        }
                                    @endphp
                                    @isset($content)
                                        @php
                                            $textWithoutTags = strip_tags($content->content);
                                            $words = str_word_count($textWithoutTags, 1);
                                            $first40Words = implode(' ', array_slice($words, 0, 30));
                                            echo $first40Words;
                                        @endphp
                                    @endisset
                                </div>
                                <a href="/{{app()->getLocale()}}/xeberler/{{$blog->slug}}" class="theme-btn btn-style-four">{{ __('read-more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

{{--        @if($block['pagination'])--}}
{{--            <ul class="styled-pagination text-center">--}}
{{--                <li><a href="#" class="active">1</a></li>--}}
{{--                <li><a href="#">2</a></li>--}}
{{--                <li><a href="#"><span class="fa fa-angle-right"></span></a></li>--}}
{{--            </ul>--}}
{{--        @endif--}}

    </div>
</div>
