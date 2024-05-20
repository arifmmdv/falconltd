@extends('layouts.web')

@section('content')
    <section class="page-title" style="background-image:url(/assets/images/background/4.jpg);">
        <div class="auto-container">
            <h1>{{$blog->title}}</h1>
        </div>
    </section>

    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <ul class="bread-crumb pull-left">
                    <li><a href="/{{app()->getLocale()}}">{{ __('home') }}</a></li>
                    <li><a href="/{{app()->getLocale()}}/media/xeberler">{{$page->title}}</a></li>
                    <li>{{$blog->title}}</li>
                </ul>
                <div class="text pull-right">{{ __('engineering-tomorrow') }}</div>
            </div>
        </div>
    </div>

    <div class="sidebar-page-container">
        <div class="auto-container narrow">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-single padding-right">

                        <!--News Block Three-->
                        <div class="news-block-three">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="/uploads/{{$blog->image}}" alt="{{$blog->title}}" />
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
                                        <h3>{{$blog->title}}</h3>
                                        @if(!empty($blog->content))
                                            @foreach (json_decode(json_encode($blog->content)) as $block)
                                                @include("blocks.$block->type", ['block' => $block->data])
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
