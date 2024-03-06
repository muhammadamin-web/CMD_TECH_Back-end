@extends('layouts.app')
@section('meta')
<meta name="description" content="Tourfetto - ваш путеводитель в мир международных путешествий. Откройте удивительные туры по всему миру.">
<meta name="keywords" content="международное туристическое агентство, мировые туры, путешествия, Tourfetto">
<meta property="og:title" content="Tourfetto - Международное туристическое агентство, Туры по всему миру">
<meta property="og:description" content="Tourfetto - ваш путеводитель в мир международных путешествий. Откройте удивительные туры по всему миру.">
<title>{{ config('app.site_name') }} - {{ __('app.projects') }}</title>


<link rel="stylesheet" href="{{ asset('css/project.css') }}">

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

<div class="projects" id="projects">
    <h2 class=" lang" key="projects">{{ __('app.projects') }}</h2>

    <div class="big">
        <?php $counter = 1; ?>
        <?php foreach ($projects as $project) : ?>

            <a href="{{ route('project.show', ['locale' => app()->getLocale(), 'slug' => $project->{'slug_' . app()->getLocale()}]) }}" class="img-wrapper_container">
                <div class="img-wrapper">
                    <img id="" class="inner-img" src="{{ asset($project->image_path) }}" />
                    <div class="middle">
                        <div class="text lang" key="projects">{{ $project->{'name_' . app()->getLocale()} }}</div>
                        <!-- <p class="more lang" key="more">{{ __('app.more') }}</p> -->
                    </div>
                </div>
            </a>

            <?php $counter++; ?>
        <?php endforeach; ?>
    </div>
</div>
@endsection