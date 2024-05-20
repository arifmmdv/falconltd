@php
    $languages = [
        "az" => __('azerbaijani'),
        "en" => __('english'),
        "ru" => __('russian'),
    ]
@endphp
    <!-- Main Header-->
<header class="main-header">

    @include('components.top-bar')

    <!-- Main Box -->
    <div class="main-box">
        <div class="auto-container">
            <div class="outer-container clearfix">
                <!--Logo Box-->
                <div class="logo-box">
                    <div class="logo">
                        <a href="/{{app()->getLocale()}}">
                            <img src="/assets/images/logo.svg" alt="">
                        </a>
                    </div>
                </div>

                <!--Nav Outer-->
                <div class="nav-outer clearfix">

                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                @foreach(\App\Models\Menu::find(1)->items as $menu)
                                    <li @if(isset($menu->children) && count($menu->children) > 0) class="dropdown" @endif>
                                        <a href="/{{app()->getLocale()}}{{$menu->slug}}">
                                            {{ $translator->translate($menu,'title') }}
                                        </a>
                                        @if(isset($menu->children) && count($menu->children) > 0)
                                            <ul>
                                                @foreach($menu->children as $child)
                                                    <li>
                                                        <a href="/{{app()->getLocale()}}{{$menu->slug}}{{$child->slug}}">
                                                            {{ $translator->translate($child,'title') }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>

                    <div class="outer-box">
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="fa fa-globe"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">
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
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!--Nav Outer End-->

            </div>
        </div>
    </div>

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="sticky-inner-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="/{{app()->getLocale()}}" class="img-responsive">
                        <img src="/assets/images/logo.svg" alt="" title="" />
                    </a>
                </div>

                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                @foreach(\App\Models\Menu::find(1)->items as $menu)
                                    <li @if(isset($menu->children) && count($menu->children) > 0) class="dropdown" @endif>
                                        <a href="/{{app()->getLocale()}}{{$menu->slug}}">
                                            {{ $translator->translate($menu,'title') }}
                                        </a>
                                        @if(isset($menu->children) && count($menu->children) > 0)
                                            <ul>
                                                @foreach($menu->children as $child)
                                                    <li>
                                                        <a href="/{{app()->getLocale()}}{{$menu->slug}}{{$child->slug}}">
                                                            {{ $translator->translate($child,'title') }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                    <div class="outer-box">
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="fa fa-globe"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">
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
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--End Sticky Header-->

</header>
<!--End Main Header -->
