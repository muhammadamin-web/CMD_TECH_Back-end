@extends('layouts.app')
@section('meta')
<title>{{ config('app.site_name') }} - {{ config('app.crud_one_name') }} </title>
<meta name="description" content="Tourfetto - ваш путеводитель в мир международных путешествий. Откройте удивительные туры по всему миру.">
<meta name="keywords" content="международное туристическое агентство, мировые туры, путешествия, Tourfetto">
<meta property="og:title" content="Tourfetto - Международное туристическое агентство, Туры по всему миру">
<meta property="og:description" content="Tourfetto - ваш путеводитель в мир международных путешествий. Откройте удивительные туры по всему миру.">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="Tourfetto - Международное туристическое агентство, Туры по всему миру">
<meta property="twitter:description" content="Tourfetto - ваш путеводитель в мир международных путешествий. Откройте удивительные туры по всему миру.">
<meta property="twitter:image" content="URL_изображения_тура_или_агентства_Tourfetto">
<!-- Qo'shimcha SEO va sayt optimallashtirish uchun taglar -->
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/static_img/icon.png') }}">
<link rel="manifest" href="/path/to/your/site.webmanifest">
<link rel="mask-icon" href="{{ asset('images/static_img/icon.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('images/static_img/icon.ico') }}">
<!-- Qo'shimcha uslublar va scriptlar --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/all_news_page.css') }}"  />
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
                <h2 class="intro_title lang">{{ __('app.intro_text8') }}</h2>
                <div class="intro_link_card">
                    <a href="/index.html" class="intro_link lang">{{ __('app.intro_text2') }}</a>
                    <p class="intro_link " >></p>
                </div>
                
            </div>
            <img src="{{ asset('images/static_img/img_slider2.jpg') }}" alt="" />
        </div>
    </section>

    <section class="new_container" id="news">
        <div class="container">
            <h2 class="container_title lang">{{ __('app.new') }}</h2>
            <div class="new_box">
            @foreach($crud_ones as $item)

                    <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $item->{'slug_' . app()->getLocale()}]) }}" class="new_link ">
                        <div  class="new_card ">
                            <img class="new_card_img" src="{{ asset($item->image_path) }}" alt="" />
                            <div class="new_card_text1">
                                <div class="text_row1">
                                    <h2>{{ $item->{'name_' . app()->getLocale()}  }}</h2>
                                </div>
                                <div class="text_row2">
                                    <a class="row2_link" href="tel:+998972680088">+998(97)268-00-88</a>
                                </div>
                            </div>
                            <div class="new_card_text3">
                                <h2 class="new_subtitle1">{{ $item->{'name_' . app()->getLocale()}  }}</h2>
                                <p class="new_subtitle2">{{ $item->{'meta_description_' . app()->getLocale()}  }}</p>
                                <div class="new_card_text2">
                                    <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $item->{'slug_' . app()->getLocale()}]) }}">{{ __('app.more') }}</a>
                                    <div class="new_card_icon">
                                        <img class="" src="{{ asset('images/static_img/calendar-249.png') }}" alt="" />
                                        <p>{{ $item->created_at_formatted }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                    @endforeach


    
        </div>
    </section>




  <!-- </div> -->
</div>



@endsection