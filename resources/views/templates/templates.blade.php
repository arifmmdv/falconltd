@extends('layouts.web')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url(/assets/images/background/4.jpg);">
        <div class="auto-container">
            <h1>Blocks</h1>
        </div>
    </section>
    <!--End Page Title-->

    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <ul class="bread-crumb pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li>Blocks</li>
                </ul>
                <div class="text pull-right">Certified Company ISO 9001-2008</div>
            </div>
        </div>
    </div>
    <!--End Page Info-->

    @include('blocks.blocks')

@endsection
