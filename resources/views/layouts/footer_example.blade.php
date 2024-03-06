<footer class="footer" id="contact">
    <div class="container">
        <div class="footer_box">
            <div class="footer_first_box">
                <div class="first_block1_1">
                    <div class="first_block1_img">
                        <img src="{{ asset('images/static_img/footer_logo2.png') }}" alt="" />
                    </div>
                    <div class="first_block1_text">
                        <p class="">{{ __('app.footer_text1') }}</p>
                    </div>
                    <div class="first_block_location">
                        <img src="{{ asset('images/static_img/footer-geo2.png') }}" alt="" />
                        <p class="">{{ __('app.footer_text2') }}</p>
                    </div>
                </div>
                <div class="first_block1">
                    <h2 class="footer_menu_title ">{{ __('app.footer_text3') }}</h2>
                    <ul class="footer_list">
                        <li>
                            <a href="{{ route('home',[app()->getLocale()]) }}" class="footer_list_link ">{{ __('app.footer_text4') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('home',[app()->getLocale()]) }}#about" class="footer_list_link ">{{ __('app.footer_text5') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('news',[app()->getLocale()]) }}" class="footer_list_link ">{{ __('app.footer_text6') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('category',[app()->getLocale()]) }}" class="footer_list_link ">{{ __('app.footer_text7') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('tour',[app()->getLocale()]) }}" class="footer_list_link ">{{ __('app.tour1') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('home',[app()->getLocale()]) }}#contact" class="footer_list_link ">{{ __('app.footer_text8') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="first_block1">
                    <h2 class="footer_menu_title ">{{ __('app.footer_text9') }}</h2>
                    <ul class="footer_list">
                        @foreach($tours_footer as $tour)
                        <li>
                            <a href="{{ route('tour.show', ['locale' => app()->getLocale(), 'slug' => $tour->{'slug_' . app()->getLocale()}]) }}" class="footer_list_link ">
                                {{ Str::limit($tour->{'name_' . app()->getLocale()}, 20) }}
                            </a>
                        </li>


                        @endforeach
                    </ul>
                </div>
                <div class="first_block1_2">
                    <h2 class="network_title ">{{ __('app.footer_text16') }}</h2>
                    <div class="network_card">
                        <a href="">
                            <img src="{{ asset('images/static_img/footer-facebook.png') }}" alt="" />
                        </a>
                        <a href="https://www.instagram.com/tourfetto_uz/">
                            <img src="{{ asset('images/static_img/footer-instagram.png') }}" alt="" />
                        </a>
                        <a href="https://t.me/Maftuna0117">
                            <img src="{{ asset('images/static_img/footer-telegram.png') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_end">
        <p>© 2023 Powered by</p>
        <a href="cmdtech.uz">
            <img src="{{ asset('images/static_img/logo5.png') }}" alt="" />
        </a>
    </div>
</footer>
<div id="myModal_2" class="modal2">
    <div class="modal2-content">
        <h1 class="">{{ __('app.modal-text') }}</h1>
    </div>
</div>




<script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
<script src="{{ asset('js/image_slider.js') }}"></script>
<script src="{{ asset('js/navbar.js') }}"></script>
<script src="{{ asset('js/card_slider.js') }}"></script>
<script src="{{ asset('js/new_slider.js') }}"></script>
<script src="{{ asset('js/about_vidio.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/modal_2.js') }}"></script>
<script src="{{ asset('js/.js') }}"></script>










<!--  -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/ckeditor.js') }}" defer></script>