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
<link rel="manifest" href="/path/to/your/site.webmanifest">
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
<header class="header" id="comanda">
    <div class="header_wrapper">
        <div class="container">
            <div class="row">
                <div class="row_card1 ">

                    <img src="{{ asset('images/static_img/footer-phone.png') }}" alt="" />
                    <a href="tel:+998938091644">(93) 809-16-44</a>
                    <img src="{{ asset('images/static_img/footer-mail2.png') }}" alt="" />
                    <a href="">cmd_tech.@gmail.com</a>
                </div>
                <div class="row_card2">
                    <div class="language_container">
                        <img src="{{ asset('images/static_img/web.png.png') }}" alt="" />
                        <a class="lang-button active_lang lang_border" data-lang="ru">Русский</a>
                        <a class="lang-button  lang_border" data-lang="uz">O'zbekcha</a>
                        <a class="lang-button" data-lang="en">English</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **Navbar** -->
    <nav>
        <div class="container">
            <div class="menu ">
                <input type="checkbox" id="check">
                <div class="logo">
                    <a href="#!"><img src="{{ asset('images/static_img/logo3.jpg') }}" alt="" /></a>
                </div>

                <ul>
                    <label class="btnn cancel" style="color: white;"><i class="fa fa-close"></i></label>

                    <li>
                        <a href="{{ route('home',[app()->getLocale()]) }}" class="lang">{{ __('app.xitmatlar') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('home',[app()->getLocale()]) }}#about" class="lang">{{ __('app.our_work') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('news',[app()->getLocale()]) }}" class="lang">{{ __('app.price') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('category',[app()->getLocale()]) }}" class="lang">{{ __('app.contact') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('service',[app()->getLocale()]) }}" class="lang">{{ __('app.articl') }}</a>
                    </li>

                    <div class="language_container1">
                    @foreach (config('app.available_locales') as $index => $locale)
                @if ($locale === app()->getLocale())
                <a class="lang-button active_lang" onclick="switchLocale('{{ $locale }}')" style="{{ $index === 0 ? 'border-right: 1px solid white;' : '' }}">{{ strtoupper($locale) }}</a>
                @else
                <a class="lang-button" onclick="switchLocale('{{ $locale }}')" style="{{ $index === 0 ? 'border-right: 1px solid white;' : '' }}">{{ strtoupper($locale) }}</a>
                @endif
                @endforeach
                    </div>
                </ul>

                <div class="logo-phone-container">
                    <div class="phone-numbers">
                        <div class="number-card">
                            <button class="nav_button"></button>
                            <img class="number_icon" src="{{ asset('images/static_img/footer-phone.png') }}" alt="" />
                            <a class="number_card_text" href="tel:+998938091644">(93) 809-16-44</a>
                        </div>
                    </div>
                </div>
                <label class="btnn bars menu1" style=" float: right; color: white;" for="check"><i class="fa fa-bars"></i></label>
            </div>
        </div>
    </nav>
</header>
@endsection

@section('content')

<div class="home-carousel-wrapper">
    <div class="home-carousel">
        <div class="home-carousel-panel">
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider1.jpg') }}')"></div>
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider1.jpg') }}')"></div>
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider1.jpg') }}')"></div>
        </div>
        <div class="home-carousel-panel">
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider2.jpg') }}')"></div>
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider2.jpg') }}')"></div>
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider2.jpg') }}')"></div>
        </div>
        <div class="home-carousel-panel">
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider3.jpg') }}')"></div>
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider3.jpg') }}')"></div>
            <div class="home-carousel-image" style="background-image: url('{{ asset('images/static_img/img_slider3.jpg') }}')"></div>
        </div>

    </div>
</div>
<div class="home-carousel-text">
    <div class="text-dynamic">
        <div class="text-dynamic-content-1 home-carousel-rotate-wrapper">
            <div class="text-dynamic-content home-carousel-rotate-item lang">{{ __('app.img_slider1') }}</div>
            <div class="text-dynamic-content home-carousel-rotate-item lang">{{ __('app.img_slider1') }}</div>
            <div class="text-dynamic-content home-carousel-rotate-item lang">{{ __('app.img_slider1') }}</div>
        </div>
        <div class="text-dynamic-content-2 home-carousel-rotate-wrapper" data-delay="200">
            <div class="text-dynamic-content home-carousel-rotate-item lang">{{ __('app.img_slider2') }}</div>
            <div class="text-dynamic-content home-carousel-rotate-item lang">{{ __('app.img_slider2') }}</div>
            <div class="text-dynamic-content home-carousel-rotate-item lang">{{ __('app.img_slider2') }}</div>
        </div>
    </div>
</div>
</div>
<section class="about" id="about">
    <div class="container">
        <div class="about_box">
            <div class="about_card_vidio" onclick="openNav('myModal', 'myVideo5')">
                <i class="fas fa-play-circle " id="myBtn"></i>
                <img src="{{ asset('images/static_img/img_slider2.jpg') }}" alt="" />
            </div>
            <div class="about_card_text">
                <div class="about_title1 ">
                    <h2 class="about_title lang">{{ __('app.about_text1') }}</h2>
                    <p class="about_title lang" style="color: #FDBA24;">{{ __('app.about_text2') }}</p>
                </div>
                <p class="about_text lang">{{ __('app.about_text3') }}</p>
                <p class="about_text lang">{{ __('app.about_text4') }}</p>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content" onclick="closeNav('myModal', 'myVideo5')">
            <div class="video-container">
                <span class="close">&times;</span>
                <video class="about_vidio" id="myVideo5" controls>
                    <source src="{{ asset('images/static_img/abut_vidio.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</section>
<section class="destination">
    <div class="container">
        <h2 class="container_title lang">{{ __('app.destination_text1') }}</h2>
        <div class="destination_box">
            <div class="destination_card_img1">

                @foreach($tours as $tour)
                @php
                $containerNumber = $loop->iteration === 1 || ($loop->iteration - 1) % 5 === 0 ? 1 : 2;
                $images = json_decode($tour->images, true); // Rasmlar massivi
                @endphp

                <a href="{{ route('service.show',['locale' => app()->getLocale(), 'slug' => $tour->{'slug_' . app()->getLocale()}] ) }}" class="img_wrapper_container{{ $containerNumber }}">
                    <div class="img_wrapper">
                        <div class="img_text1">
                            <p class="lang">{{ Str::limit($tour->{'name_' . app()->getLocale()}, 20) }}</p>
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

<div class="slider">
    <h2 class="container_title lang">{{ __('app.aboutme_text1') }}</h2>
    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                @foreach($client_comments as $client_comment)

                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset($client_comment->image_path) }}" alt="" class="card-img" />
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">{{ Str::limit($client_comment->{'name_' . app()->getLocale()}, 30) }}</h2>
                        <p class="description">{{ Str::limit($client_comment->{'description_' . app()->getLocale()}, 100) }}</p>

                    </div>
                </div>
                @endforeach

            </div>
            <!-- <div class="swiper-button-next swiper-navBtn"></div> -->
            <!-- <div class="swiper-button-prev swiper-navBtn"></div> -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<section class="new_container" id="news">
    <div class="container">
        <h2 class="container_title lang">{{ __('app.new') }}</h2>
        <div class="new_box">
            @foreach($crud_one as $news)

            <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $news->{'slug_' . app()->getLocale()}]) }}" class="new_link ">
                <div class="new_card ">
                    <img class="new_card_img" src="{{ asset($news->image_path) }}" alt="" />
                    <div class="new_card_text1">
                        <div class="text_row1">
                            <h2>{{ Str::limit($news->{'name_' . app()->getLocale()}, 20) }}</h2>
                            <!-- <h4>Tailand Qirolligi</h4> -->
                        </div>
                        <div class="text_row2">
                            <a class="row2_link" href="tel:+998972680088">+998(97)268-00-88</a>
                        </div>
                    </div>
                    <h2 class="new_subtitle1">{{ Str::limit($news->{'name_' . app()->getLocale()}, 20) }}</h2>
                    <p class="new_subtitle2">{{ Str::limit($news->{'meta_description_' . app()->getLocale()}, 50) }}</p>
                    <div class="new_card_text2">
                        <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $news->{'slug_' . app()->getLocale()}]) }}">{{ __('app.more') }}</a>
                        <div class="new_card_icon">
                            <img class="" src="{{ asset('images/static_img/calendar-249.png') }}" alt="" />
                            <p class="news_card_date">{{ $news->created_at_formatted }}</p> <!-- Bu yerda o'zgarish qilindi -->
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        <div class="slider_btn_box">
            <button class="slider-btn prev-btn">&#10094;</button>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>
</section>
<section class="order">
    <div class="container">
        <p class="order_subtitle lang">{{ __('app.order_text1') }}</p>
        <h2 class="order_title lang">{{ __('app.order_text2') }}</h2>
        <div class="order_box">
            <form action="{{ route('home.lead', ['locale' => app()->getLocale()]) }}" method="POST" id="leadForm">
                @csrf <!-- CSRF token -->

                <input class="order_input" type="text" placeholder="ИМЯ" id="name" name="name" required>
                <input class="order_input" type="text" placeholder="+998_______" id="phone" name="phone" required>
                <input class="order_input" type="email" placeholder="yourmail@gmail.com" id="email" name="email" required>
                <textarea class="coment_input" type="text" id="description" name="description"></textarea>
                <button type="submit" class="btn order_link btn-primary" style="">{{ __('app.order_text3') }}</button>
            </form>
            <!-- <a class="order_link lang" id="myBtnn" href="#!"></a> -->
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('leadForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            fetch("{{ route('home.lead', ['locale' => app()->getLocale()]) }}", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        var modal = document.getElementById('myModal_2');
                        modal.classList.add('show');

                        setTimeout(function() {
                            modal.classList.remove('show');
                            modal.classList.add('hide');
                        }, 1500);

                        // Formani tozalash
                        form.reset();
                    }
                })
                .catch(error => console.error('Xatolik:', error));
        });
    });
</script>
<div id="myModal_2" class="modal2">
    <div class="modal2-content">
        <h1 class="lang" key="">{{ __('app.modal-text') }}</h1>
    </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal tarkibi -->

            <h1>Murojaat jo'natildi</h1>
        </div>
    </div>
</div>
@endsection