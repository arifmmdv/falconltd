@php
    if (!empty($page->seo_title)) {
        $title = $page->seo_title;
    } else {
        $title = env('APP_NAME').' - Engineering Tomorrow - '.$page->title;
    }
    if (!empty($page->seo_description)) {
        $description = $page->seo_description;
    } else {
        $description = 'Tecnocon texnologiya və mühəndislik sahəsində müştərilərə ən innovativ və effektiv həlləri təklif edən bir şirkətdir. Biz, İnşaat dünyasında fəal rolu ilə tanınan və müştərilərinə müstəqil və innovativ həllər təqdim edən bir kompanyayıq.';
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- TITLE OF SITE -->
    <meta name="keywords" content="" />
    <meta name="author" content="{{env('APP_NAME')}}" />
    <meta name="robots" content="" />
    <meta name="description" content="{{$description}}" />
    <title>{{$title}}</title>

    <!-- Og Tags -->
    <meta property="og:title" content="{{$title}}" />
    <meta property="og:site_name" content="{{env('APP_NAME')}}">
    <meta property="og:url" content="{{env('APP_URL')}}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{env('APP_URL')}}/og.jpg" />
    <meta property="og:image:secure_url" content="{{env('APP_URL')}}/og.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="{{env('APP_NAME')}}" />
    <meta property="og:description" content="{{$description}}" />

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="Shortcut Icon" type="image/png" href="favicon.ico" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="/assets/js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">

    @include('components.header')

    @yield('content')

    @include('components.footer')

</div>

</body>
</html>
