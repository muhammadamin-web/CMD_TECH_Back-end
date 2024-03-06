@extends('layouts.app')
@section('meta')
<meta name="keywords" content="{{ $category->{'tags_' . app()->getLocale()} }}">
<meta name="description" content="{{ $category->{'description_' . app()->getLocale()} }}">
<meta property="og:title" content="{{ $category->{'name_' . app()->getLocale()}  }}">
<meta property="og:description" content="{{ $category->{'description_' . app()->getLocale()} }}">
<meta type="image/jpeg" name="link" href="{{ asset($category->image_path) }}" rel="image_src">

<title>{{ config('app.site_name') }} - {{ $category->{'name_' . app()->getLocale()} }}</title>


<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/tour_page.css') }}"  />
    <link rel="stylesheet" href="{{ asset('css/category_page.css') }}"  />
@endsection

@section('navbar')
<nav class="nav">
    <div class="container">
        <div class="menu ">
            <input type="checkbox" id="check">

            <a href="{{ route('home',[app()->getLocale()]) }}">
                <div class="logo">
                    <img class="" data-original="{{ asset('images/static_img/logo2.2.png') }}" id="logo_img" src="{{ asset('images/static_img/logo2.2.png') }}" data-scroll-src="{{ asset('images/static_img/logo2.2.png') }}" alt="Logo" /> <!-- <img src="assets/images/logo1.1.png" alt=""> -->
            </a>
        </div>


        <ul class="nav_list">
            <label class="btnn cancel close_btn">
                <i class="fa fa-close" style="color: white;"></i>
            </label>
            <li>
                <a href="{{ route('home',[app()->getLocale()]) }}" class="lang">{{ __('app.home') }}</a>
            </li>
            <li>
                <a href="{{ route('home',[app()->getLocale()]) }}#about" class="lang">{{ __('app.about') }}</a>
            </li>
            <li>
                <a href="{{ route('news',[app()->getLocale()]) }}" class="lang">{{ __('app.new') }}</a>
            </li>
            <li>
                <a href="{{ route('category',[app()->getLocale()]) }}" class="lang">{{ __('app.tour') }}</a>
            </li>
            <li>
                <a href="{{ route('tour',[app()->getLocale()]) }}" class="lang">{{ __('app.tour1') }}</a>
            </li>
            <li>
                <a href="#contact" class="lang">{{ __('app.contact') }}</a>
            </li>
            <div class="language_container1">
                @foreach (config('app.available_locales') as $locale)
                <a class="lang-button {{ app()->getLocale() === $locale ? 'active_lang' : '' }}" onclick="switchLocale('{{ $locale }}')" >
                    <img src="{{ asset('images/static_img/flag_' . $locale . '.png') }}" alt="{{ $locale }}">
                </a>
                @endforeach
            </div>

        </ul>
        <a href="tel:+998972680088" class="nav_tel">+998 97 268-00-88</a>
        <label class="btnn bars menu1 open_btn" style=" float: right; color: #174581;" for="check">
            <i class="fa fa-bars"></i>
        </label>
    </div>
    </div>
</nav>



@endsection


@section('content')


<section class="intro">
        <div class="intro_box">
            <div class="intro_card">
                <h2 class="intro_title lang">{{ __('app.intro_text7') }}</h2>
                <div class="intro_link_card">
                    <a href="{{ route('home',[app()->getLocale()]) }}" class="intro_link lang">{{ __('app.intro_text2') }}</a>
                    <p class="intro_link " >></p>
                </div>
            </div>
            <img src="{{ asset('images/static_img/img_slider2.jpg') }}" alt="" />
        </div>
    </section>

    <section class="destination">
        <div class="container">
            <h2 class="container_title lang">{{ $category->{'name_' . app()->getLocale()} }}</h2>
            <div class="destination_box">
                <div class="destination_card_img1">
                @foreach($tours as $tour)
                @php
                $images = json_decode($tour->images, true); // Rasmlar massivi
                @endphp
                    <a href="{{ route('tour.show', ['locale' => app()->getLocale(), 'slug' => $tour->{'slug_' . app()->getLocale()}]) }}" class="img_wrapper_container">
                        <div class="img_wrapper">
                            <div class="img_text1">
                                <p>{{ Str::limit($tour->{'name_' . app()->getLocale()}, 20) }}</p>
                                <div class="border"></div>
                            </div>
                            @if(!empty($images) && isset($images[0])) {{-- Birinchi rasm mavjudligini tekshirish --}}
                        <img src="{{ asset($images[0]) }}" alt="{{ $tour->{'name_' . app()->getLocale()} }}" />
                        @endif
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </section>







@endsection