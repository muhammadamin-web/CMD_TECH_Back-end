@extends('layouts.app')
@section('meta')

<title>{{ config('app.site_title') }} </title>

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
<link rel="mask-icon" href="{{ asset('images/static_img/icon.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('images/static_img/icon.ico') }}">
<!-- Qo'shimcha uslublar va scriptlar -->
<!-- Qo'shimcha uslublar va scriptlar -->
<title>CMD TECH</title>
<link rel="stylesheet" href="{{ asset('css/all_portfolio_page.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style_nav_footer.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('navbar')

@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="container_section">
            <div class="section_card1">
                <h1 class="section_card1_text1">
                    <p class="lang" style="color: #5050FE !important;">{{ __('app.section1_text1.1') }}</p>
                    <p class="lang" >{{ __('app.section1_text1.2') }}</p>
                </h1>
                <div class="section_card1_text2">
                    <p class="card1_text lang" >{{ __('app.section1_text2') }}</p>
                    <p class="card1_text lang" >{{ __('app.section1_text3') }}</p>
                    <p class="card1_text lang" >{{ __('app.section1_text4') }}</p>
                </div>
                <div class="section_card1_text3">
                    <button class="nav_button1">
                        <a href="tel:+998938091644" class="lang btn_hover" >{{ __('app.section1_text5') }}</a>
                    </button>
                    <a class="card1_text3" href="tel:+998938091644">(93) 809-16-44</a>
                </div>
            </div>
            <div class="section_card2">
                <img src="{{ asset('images/static_img/section1-img.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>
<div class="our_section" id="xitmatlar">
    <div class="container">
        <div class="sectoin_text">
            <h2 class="">
                <p class="lang" style="color: #5050FE !important;">{{ __('app.our_section_text1.1') }}</p>
                <p class="lang" >{{ __('app.our_section_text1.2') }}</p>
            </h2>
        </div>
        <div class="row1">
        @foreach($tours as $tour)

            <div class="row_card">
                <div class="im1">
                    <img src="{{ asset('images/static_img/crm-create.png') }}" alt="" />
                </div>
                <div class="section_h4">
                    <h4 class="lang" >{{ Str::limit($tour->{'short_name_' . app()->getLocale()}, 30) }}</h4>
                </div>
                <div class="section_p">
                    <p class="lang" >{{ Str::limit($tour->{'meta_description_' . app()->getLocale()}, 300) }}</p>
                </div>
                <div class="section_button">
                    <button class="sbutton_text">
                        <a class="btn_hover lang" href="{{ route('service.show',['locale' => app()->getLocale(), 'slug' => $tour->{'slug_' . app()->getLocale()}] ) }}">{{ __('app.our_section_text4') }}</a>
                    </button>
                </div>
            </div>
            @endforeach

            <!-- <div class="row_card">
                <div class="im1">
                    <img src="{{ asset('images/static_img/Online-dokon.jpg') }}" alt="" />
                </div>
                <div class="section_h4">
                    <h4 class="lang" >{{ __('app.our_section_text13') }}</h4>
                </div>
                <div class="section_p">
                    <p class="lang" >{{ __('app.our_section_text14') }}</p>
                </div>
                <div class="section_button">
                    <button class="sbutton_text">
                        <a class="lang btn_hover" href="price_page.html">{{ __('app.our_section_text4') }}</a>
                    </button>
                </div>
            </div>
            <div class="row_card">
                <div class="im1">
                    <img src="{{ asset('images/static_img/smm.webp') }}" alt="" />
                </div>
                <div class="section_h4">
                    <h4 class="lang" >{{ __('app.our_section_text17') }}</h4>
                </div>
                <div class="section_p">
                    <p class="lang" >{{ __('app.our_section_text18') }}</p>
                </div>
                <div class="section_button">
                    <button class="sbutton_text">
                        <a class="lang btn_hover" href="price_page.html">{{ __('app.our_section_text4') }}</a>
                    </button>
                </div>
            </div>
            <div class="row_card">
                <div class="im1">
                    <img src="{{ asset('images/static_img/websayt.png') }}" alt="" />
                </div>
                <div class="section_h4">
                    <h4 class="lang" >{{ __('app.home') }}</h4>
                </div>
                <div class="section_p">
                    <p class="lang" >{{ __('app.our_section_text6') }}</p>
                </div>
                <div class="section_button">
                    <button class="sbutton_text">
                        <a class="lang btn_hover" href="price_page.html">{{ __('app.our_section_text4') }}</a>
                    </button>
                </div>
            </div>
            <div class="row_card">
                <div class="im1">
                    <img src="{{ asset('images/static_img/SEO-optimallashtirish.jpeg') }}" alt="" />
                </div>
                <div class="section_h4">
                    <h4 class="lang" >{{ __('app.our_section_text2') }}</h4>
                </div>
                <div class="section_p">
                    <p class="lang" >{{ __('app.our_section_text3') }}</p>
                </div>
                <div class="section_button">
                    <button class="sbutton_text">
                        <a class="lang btn_hover" href="price_page.html">{{ __('app.our_section_text4') }}</a>
                    </button>
                </div>
            </div>
            <div class="row_card">
                <div class="im1">
                    <img src="{{ asset('images/static_img/google-ads-services.jpg') }}" alt="" />
                </div>
                <div class="section_h4">
                    <h4 class="lang" >{{ __('app.our_section_text7') }}</h4>
                </div>
                <div class="section_p ">
                    <p class=" lang" >{{ __('app.our_section_text8') }}</p>
                </div>
                <div class="section_button">
                    <button class="sbutton_text">
                        <a class="lang btn_hover" href="price_page.html">{{ __('app.our_section_text4') }}</a>
                    </button>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="our_works">
    <div class="container">
        <div class="works_text">
            <h2 style="">
                <p class="lang" style="color: #5050FE;">{{ __('app.our_works_text1.1') }}</p>
                <p class="lang" >{{ __('app.our_works_text1.2') }}</p>
            </h2>
        </div>
        <div class="our_wors_container">
        @php
    // Bu yerda barcha tour_id'larni olish uchun bir marta bazadan so'rov yuboriladi
    $tours = \App\Models\Tour::findMany($crud_one->tour_ids);
@endphp
        @foreach($crud_one as $project)

            <div class="our_wroks_content">
                <div class="wroks_content_img">
                    <a href="portfolio_page2.html">
                        <div class="work_link_box">
                            <div class="work_link_card1">
                            <p class="work-link-text">{{ $tour->name_ru }}</p>
                                <p class="work-link-text">sayt</p>
                            </div>
                            <div class="work_link_card1">
                                <p class="work-link-text">{{ Str::limit($project->{'site_name'}, 20) }}</p>
                            </div>
                        </div>
                        <img src="{{ asset($project->image_path) }}" alt="" />
                    </a>
                </div>
            </div>
            @endforeach

            <!-- <div class="our_wroks_content">
                <div class="wroks_content_img">
                    <a href="portfolio_page2.html">
                        <div class="work_link_box">
                            <div class="work_link_card1">
                                <p class="work-link-text">sayt</p>
                                <p class="work-link-text">sayt</p>
                            </div>
                            <div class="work_link_card1">
                                <p class="work-link-text">Verostroy.uz</p>
                            </div>
                        </div>
                        <img src="{{ asset('images/static_img/2.jpg') }}" alt="" />
                    </a>
                </div>
            </div>
            <div class="our_wroks_content">
                <div class="wroks_content_img">
                    <a href="portfolio_page2.html">
                        <div class="work_link_box">
                            <div class="work_link_card1">
                                <p class="work-link-text">sayt</p>
                                <p class="work-link-text">sayt</p>
                            </div>
                            <div class="work_link_card1">
                                <p class="work-link-text">Verostroy.uz</p>
                            </div>
                        </div>
                        <img src="{{ asset('images/static_img/eurolight.png') }}" alt="" />
                    </a>
                </div>
            </div>
            <div class="our_wroks_content">
                <div class="wroks_content_img">
                    <a href="portfolio_page2.html">
                        <div class="work_link_box">
                            <div class="work_link_card1">
                                <p class="work-link-text">sayt</p>
                                <p class="work-link-text">sayt</p>
                            </div>
                            <div class="work_link_card1">
                                <p class="work-link-text">Verostroy.uz</p>
                            </div>
                        </div>
                        <img src="{{ asset('images/static_img/sibernecroclean.ruru.jpg') }}" alt="" />
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="section2" id="comment1">
    <div class="container">
        <div class="section2_box">
            <div class="section2_card1">
                <img class="section2_card_img" src="{{ asset('images/static_img/section2-4.png') }}" alt="" />
            </div>
            <div class="section2_box_text">
                <div class="box_text1">
                    <h4 class="" key="">
                        <p class="lang" style="color: #5050FE;">{{ __('app.section2_text1.1') }}</p>
                        <p class="lang" >{{ __('app.section2_text1.2') }}</p>
                    </h4>
                </div>
                <div class="box_text2">
                    <h3 class="lang" >{{ __('app.section2_text2') }}</h3>
                    <p class="lang" >{{ __('app.section2_text3') }}</p>
                    <!-- <img class="section2_box_img" src="img/line.png.png" alt=""> -->
                    <div class="section2_border"></div>
                    <div class="box_text2_img">
                        <img src="{{ asset('images/static_img/shuhrat.jpg.png') }}" alt="" />
                        <h2 class="lang" >{{ __('app.section2_text4') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="order_seo">
    <div class="container">
        <div class="order_seo_text">
            <p class="lang" >{{ __('app.order_text1') }}</p>
            <h2 class="lang" >{{ __('app.order_text2') }}</h2>
            <p class="lang" >{{ __('app.order_text3') }}</p>
            <button class="seo_button_text">
                <a class="lang btn_hover" href="tel:+998938091644">{{ __('app.order_text4') }}</a>
            </button>
        </div>
    </div>
</div>
<div class="about_container">
    <div class="container">
        <div class="about_card">
            <div class="about_card_text">
                <h4 class="lang" >{{ __('app.about_text1') }}</h4>
                <p class="lang" >{{ __('app.about_text2') }}</p>
            </div>
        </div>
        <div class="about_box">
            <div class="about_box_text">
                <h4 class="lang" >{{ __('app.about_text3') }}</h4>
                <p class="lang" >{{ __('app.about_text4') }}</p>
            </div>
            <div class="about_box_text">
                <h4 class="lang" >{{ __('app.about_text5') }}</h4>
                <p class="lang" >{{ __('app.about_text6') }}</p>
            </div>
            <div class="about_box_text">
                <h4 class="lang" >{{ __('app.about_text7') }}</h4>
                <p class="lang" >{{ __('app.about_text8') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="section2-4">
    <div class="container">
        <div class="section2-4_box">
            <h4  >{{ __('app.section2_4_text1') }}</h4>
                <h4 class="lang" style="color: #5050FE;">{{ __('app.section2_4_text1.2') }}</h4>
            </h4>
            <p class="lang" >{{ __('app.section2_4_text2') }}</p>
            <a href="tel:+998938091644" class="lang section2-4_button btn_hover" id="myBtn2">{{ __('app.section2_4_text3') }}</a>
        </div>
    </div>
</div>
<div class="seo_container">
    <div class="container">
        <div class="seo_content_box">
            <div class="seo_img_box">
                <img src="{{ asset('images/static_img/seo-card.webp') }}" alt="" />
            </div>
            <div class="seo_text_box">
                <div class="seo_text_title">
                    <h2 class="" key="">
                        <h2 class="lang" >{{ __('app.seo_text1.1') }}</h2>
                        <h2 class="lang" style="color: #5050FE;">{{ __('app.seo_text1.2') }}</h2>
                    </h2>
                </div>
                <div class="seo_text_subtitle">
                    <p class="lang" >{{ __('app.seo_text2') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection