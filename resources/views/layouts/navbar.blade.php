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
                    <!-- <div class="language_container">
                        <img src="{{ asset('images/static_img/web.png.png') }}" alt="" />
                        <a class="lang-button active_lang lang_border" data-lang="ru">Русский</a>
                        <a class="lang-button  lang_border" data-lang="uz">O'zbekcha</a>
                        <a class="lang-button" data-lang="en">English</a>
                    </div> -->
                    <div class="language_container">
                        <img src="{{ asset('images/static_img/web.png.png') }}" alt="" />

                        @foreach (config('app.available_locales') as $index => $locale)
                        @php
                        switch ($locale) {
                        case 'uz':
                        $langName = "O'zbekcha";
                        break;
                        case 'ru':
                        $langName = "Русский";
                        break;
                        case 'en':
                        $langName = "English";
                        break;
                        default:
                        $langName = strtoupper($locale);
                        break;
                        }
                        @endphp

                        @if ($locale === app()->getLocale())
                        <a class="lang-button active_lang" onclick="switchLocale('{{ $locale }}')">{{ $langName }}</a>
                        @else
                        <a class="lang-button" onclick="switchLocale('{{ $locale }}')" style="border-left: 1px solid white;">{{ $langName }}</a>
                        @endif
                        @endforeach

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
                        <a href="{{ route('home',[app()->getLocale()]) }}#xitmatlar" class="lang">{{ __('app.articl') }}</a>
                    </li>

                    <div class="language_container1">
                        @foreach (config('app.available_locales') as $index => $locale)
                        @if ($locale === app()->getLocale())
                        <a class="lang-button active_lang" onclick="switchLocale('{{ $locale }}')" style="{{ $index === 0 ? 'border-right: 1px solid white;' : '' }}">{{ strtoupper($locale) }}</a>
                        @else
                        <a class="lang-button" onclick="switchLocale('{{ $locale }}')" style="border-left   : 1px solid white;">{{ strtoupper($locale) }}</a>
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
<!-- <nav class="nav">
    <div class="container">
        <div class="menu ">
            <input type="checkbox" id="check">

            <a href="{{ route('home',[app()->getLocale()]) }}">
                <div class="logo">
                    <img class="" data-original="{{ asset('images/static_img/logo1.1.png') }}" id="logo_img" src="{{ asset('images/static_img/logo1.1.png') }}" data-scroll-src="{{ asset('images/static_img/logo2.2.png') }}" alt="Logo" /> <!-- <img src="assets/images/logo1.1.png" alt=""> -->
            <!-- </a>
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
</nav> -->
