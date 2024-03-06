@extends('layouts.app')
@section('meta')
<meta name="keywords" content="{{ $project->{'tags_' . app()->getLocale()} }},">
<meta name="description" content="{{ $project->{'meta_description_' . app()->getLocale()} }}">
<meta property="og:title" content="{{ $project->{'name_' . app()->getLocale()} }}">
<meta property="og:description" content="{{ $project->{'meta_description_' . app()->getLocale()} }}">
<title>{{ config('app.site_name') }} - {{ $project->{'name_' . app()->getLocale()}  }}</title>


<link rel="stylesheet" href="{{ asset('css/product_detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/interier_detail.css') }}">

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
<!-- <div class="container">
    <h2>{{ __('Project Details') }}</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $project->{'name_' . app()->getLocale()} }}</h5>
            @if($project->image_path)
                <img src="{{ asset($project->image_path) }}" alt="{{ $project->image_name }}" class="img-fluid">
            @endif
        </div>
    </div>
    <a href="{{ route('projects.index') }}" class="btn btn-primary mt-3">{{ __('Back to Projects') }}</a>
</div> -->
<div class="interier_detail">
    <div class="interier_detail_container">
        <h1 class="interier_detail_title">{{ $project->{'name_' . app()->getLocale()}  }}</h1>
    </div>
    <div class="show_image_container">

        <img src="{{ asset($project->image_path) }}" alt="" class="interier_detail_img">
    </div>
    <p class="image_alt">{{ $project->{'meta_description_' . app()->getLocale()} }}</p>

    <div class="interier_detail_description">
        <p>{!! $project->{'description_' . app()->getLocale()} !!}</p>
    </div>
</div>
@endsection