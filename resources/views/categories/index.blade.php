@extends('layouts.app')
@section('meta')
<meta name="description" content="Tourfetto - ваш путеводитель в мир международных путешествий. Откройте удивительные туры по всему миру.">
<meta name="keywords" content="международное туристическое агентство, мировые туры, путешествия, Tourfetto">
<meta property="og:title" content="Tourfetto - Международное туристическое агентство, Туры по всему миру">
<meta property="og:description" content="Tourfetto - ваш путеводитель в мир международных путешествий. Откройте удивительные туры по всему миру.">
<title>{{ config('app.site_name') }} - {{ __('app.intro_text9') }}</title>
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/all_category_page.css') }}"  />
<style>
    @media (max-width: 680px){
    .products{
    padding-top: 100px !important;
}
    }
</style>
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Categories') }}
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary float-right">{{ __('Create Category') }}</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name_uz }}</td>

                                <td>
                                    @if($category->image_path)
                                    <img src="{{ asset($category->image_path) }}" alt="{{ $category->name_uz }}" width="50">
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-primary">Show</a>
         
   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->


<section class="intro">
        <div class="intro_box">
            <div class="intro_card">
                <h2 class="intro_title lang">{{ __('app.intro_text9') }}</h2>
                <div class="intro_link_card">
                    <a href="{{ route('home',[app()->getLocale()]) }}" class="intro_link lang">{{ __('app.intro_text2') }}</a>
                    <p class="intro_link " >></p>
                </div>
            </div>
            <img src="{{ asset('images/static_img/img_slider1.jpg') }}" alt="" />
        </div>
    </section>


    <section class="seasonal">
        <div class="container">
            <h2 class="container_title lang">{{ __('app.tour') }}</h2>
            <div class="seasonal_box">
            @foreach($categories as $category)

                <div class="seasonal_card">
                    <a class="seasonal_img_link" href="{{ route('category.show', ['locale' => app()->getLocale(), 'slug' => $category->{'slug_' . app()->getLocale()}]) }}" >
                        <img src="{{ asset($category->image_path) }}" alt="" />
                        <div class="card_overlay">
                            <p class="card_text ">{{ Str::limit($category->{'name_' . app()->getLocale()}, 20) }}</p>
                            <a class="card_text2 "  href="{{ route('category.show', ['locale' => app()->getLocale(), 'slug' => $category->{'slug_' . app()->getLocale()}]) }}">{{ __('app.more') }}</a>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>



<!-- 
<div class="products" id="products">


    
    <div class="products_black product_page">
      <h2 class="lang" key="products_category">{{ __('app.categories') }}</h2>

      <div class="products_container">
      @foreach($categories as $category)

      <a href="{{ route('category.show', ['locale' => app()->getLocale(), 'slug' => $category->{'slug_' . app()->getLocale()}]) }}" class="product_card">

          <div class="product_img_wrapper">
            <img class="product_inner-img" src="{{ asset($category->image_path) }}" />
            <div class="product_middle">
              <div class="product_text lang" key="products1">{{ $category->{'name_' . app()->getLocale()} }}</div>
            </div>
          </div>
        </a>
        @endforeach
       

      </div>
    </div>

  </div> -->
@endsection
