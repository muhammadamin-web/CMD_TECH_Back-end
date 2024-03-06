@extends('layouts.app')
@section('meta')
<meta name="keywords" content="{{ $tour->{'tags_' . app()->getLocale()} }}">
<meta name="description" content="{{ $tour->{'meta_description_' . app()->getLocale()} }}">
<meta property="og:title" content="{{ $tour->{'name_' . app()->getLocale()} }}">
<meta property="og:description" content="{{ $tour->{'meta_description_' . app()->getLocale()} }}">

<meta type="image/jpeg" name="link" href="{{ asset($tour->image_path) }}" rel="image_src">
<title>{{ config('app.site_name') }} - {{ $tour->{'name_' . app()->getLocale()}  }}</title>
<!-- <link rel="stylesheet" href="{{ asset('css/product_detail.css') }}"> -->
<link rel="stylesheet" href="{{ asset('css/tour_page.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/interier_detail.css') }}"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

@php
$images = json_decode($tour->images, true); // Rasmlar massivi
@endphp



<section class="intro">
  <div class="intro_box">
    <div class="intro_card">
      <h2 class="intro_title lang">{{ __('app.intro_text1') }}</h2>
      <div class="intro_link_card">
        <a href="{{ route('home',[app()->getLocale()]) }}" class="intro_link lang">{{ __('app.intro_text2') }}</a>
        <p h class="intro_link ">></p>
        <a href="{{ route('category.show', ['locale' => app()->getLocale(), 'slug' => $tour->category->{'slug_' . app()->getLocale()}]) }}" class="intro_link2 lang">{{ $tour->category->{'name_' . app()->getLocale()}  }}</a>
      </div>
    </div>
    <img src="{{ asset('images/static_img/img_slider3.jpg') }}" alt="" />
  </div>
</section>
<section class="about">
  <div class="container">
    <h2 class="about_title1 lang">{{ $tour->{'name_' . app()->getLocale()}  }}</h2>
    <div class="about_box">
      <div class="about_card_slider">
        <div class="slide-container1">
          @foreach($images as $image)
          <div class="slide fade">
            <img src="{{ asset($image) }}" alt="">
          </div>
          @endforeach



          <a class="prev" title="Previous">&#10094</a>
          <a class="next" title="Next">&#10095</a>
        </div>
        <div class="dots-container">
        @foreach($images as $index => $image)
    <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
@endforeach

        </div>
      </div>
      <div class="about_container_text">
        <div class="about_slider_text">
          <h2 class="about_title lang">{{ __('app.tour_lang5') }}</h2>
          <div class="subtitle_card">
            <img src="{{ asset('images/static_img/garantiya.png') }}" alt="" />
            <p class="lang">{{ __('app.tour_lang6') }}</p>
          </div>
          <div class="subtitle_card">
            <img src="{{ asset('images/static_img/phone2.png') }}" alt="" />
            <p class="lang">{{ __('app.tour_lang7') }}</p>
          </div>
          <div class="subtitle_card">
            <img src="{{ asset('images/static_img/zvezda.png') }}" alt="" />
            <p class="lang">{{ __('app.tour_lang8') }}</p>
          </div>
          <div class="subtitle_card">
            <img src="{{ asset('images/static_img/polet2.png') }}" alt="" />
            <p class="lang">{{ __('app.tour_lang9') }}</p>
          </div>

        </div>
        <div class="about_slider_text">
          <div class="subtitle_card">
            <img src="{{ asset('images/static_img/price.webp') }}" alt="" />
            <p class="lang">{{ __('app.tour_lang10') }}{{ $tour->price }}$</p>
          </div>
        </div>
      </div>

    </div>
</section>


<section class="description">
  <div class="container">
    <h2 class="description_title lang">{{ __('app.tour_lang1') }}</h2>
    <div class="description_box">
      <h4 class="description_text lang">{!! $tour->{'description_' . app()->getLocale()} !!}</h4>
    </div>
  </div>
</section>


<section class="destination">
  <div class="container">
    <h2 class="container_title lang">{{ __('app.tour_lang11') }}</h2>
    <div class="destination_box">
      <div class="destination_card_img1">
        @foreach($tours_footer as $tour)
        @php
        $images = json_decode($tour->images, true); // Rasmlar massivi
        @endphp
        <a href="{{ route('tour.show',['locale' => app()->getLocale(), 'slug' => $tour->{'slug_' . app()->getLocale()}] ) }}" class="img_wrapper_container">
          <div class="img_wrapper1">
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















<script src="{{ asset('js/tour_slider.js') }}" ></script>

@endsection