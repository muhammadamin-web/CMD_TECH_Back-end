<footer class="footer" id="contact">
    <div class="container">
        <div class="footer_box">
            <div class="footer_first_box">
                <div class="first_block1">
                    <p class="first_block1_title ">{{ __('app.footer_text1.1') }}</p>
                    <p class="first_block1_title lang" style="color: #5050FE;">{{ __('app.footer_text1.2') }}</p>
                    </p>
                    <p class="first_block1_subtitle lang">{{ __('app.footer_text2') }}</p>
                    <a href="#!" class="footer_link lang btn_hover" id="myBtn3">{{ __('app.footer_text2.2') }}</a>
                </div>
                <div class="first_block1">
                    <p>
                    <p class="first_block2_title lang" style="color: #5050FE;">{{ __('app.footer_text3.1') }}</p>
                    <p class="first_block2_title lang">{{ __('app.footer_text3.2') }}</p>
                    </p>
                    <p class="first_block2_subtitle lang">{{ __('app.footer_text4') }}</p>
                    <div class="first_phone">
                        <div class="first_phone_block">
                            <img src="{{ asset('images/static_img/footer-phone1.png') }}" alt="" />
                            <a href="tel:+998938091644">(93) 809-16-44</a>
                        </div>
                    </div>
                </div>
                <div class="firs_block1">
                    <p class="first_block3_title lang">{{ __('app.footer_text5') }}</p>
                    <div class="first_block_location">
                        <img src="{{ asset('images/static_img/footer-geo.png') }}" alt="" />
                        <p class="lang">{{ __('app.footer_text6') }}</p>
                    </div>
                    <div class="first_block3_gmail">
                        <img src="{{ asset('images/static_img/footer-mail.png') }}" alt="" />
                        <p>cmd_tech.@gmail.com</p>
                    </div>
                    <div class="first_block3_website">
                        <img src="{{ asset('images/static_img/footer-web2.png') }}" alt="" />
                        <p>https://cmd_tech.uz</p>
                    </div>
                </div>
            </div>
            <div class="devide_line"></div>
            <div class="footer_second_box">
                <div class="second_block">
                    <h2 class="second_title lang">{{ __('app.footer_text7') }}</h2>
                    <div class="second_subtitle">
                        <li>
                            <a href="#xitmatlar" class="lang">{{ __('app.xitmatlar') }}</a>
                        </li>
                        <li>
                            <a href="#comanda" class="lang">{{ __('app.footer_text9') }}</a>
                        </li>
                        <!-- <li><a href="#!" class="lang" >{{ __('app.footer_text10') }}</a></li> -->
                        <li>
                            <a href="price_page.html" class="lang">{{ __('app.price') }}</a>
                        </li>
                    </div>
                </div>
                <div class="second_block">
                    <h2 class="second_title lang">{{ __('app.footer_text12') }}</h2>
                    <div class="second_subtitle">
                        <li>
                            <a href="all_article_page.html" class="lang">{{ __('app.footer_text13') }}</a>
                        </li>
                        <li>
                            <a href="all_portfolio_page.html" class="lang">{{ __('app.footer_text14') }}</a>
                        </li>
                        <li>
                            <a href="all_portfolio_page.html#comments" class="lang">{{ __('app.footer_text15') }}</a>
                        </li>
                    </div>
                </div>
                <div class="second_block2">
                    <h2 class="second_title lang">{{ __('app.footer_text17') }}</h2>
                    <div class="second_links">
                        <a href="https://www.instagram.com/cmdtech.uz/">
                            <li class="icon instagram">
                                <span>
                                    <i class="fab fa-instagram" style="font-size:24px"></i>
                                </span>
                            </li>
                        </a>
                        <a href="https://t.me/Muhammadamin_Mirboqijonov/">
                            <li class="icon telegram">
                                <span>
                                    <i class="fab fa-telegram-plane" style="font-size:24px"></i>
                                </span>
                            </li>
                        </a>
                        <a href="https://t.me/Muhammadamin_Mirboqijonov/">
                            <li class="icon linkedin">
                                <span>
                                    <i class="fab fa-linkedin-in" style="font-size:24px"></i>
                                </span>
                            </li>
                        </a>
                        <a href="https://t.me/Muhammadamin_Mirboqijonov/">
                            <li class="icon facebook">
                                <span>
                                    <i class="fab fa-facebook-f" style="font-size:24px"></i>
                                </span>
                            </li>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_end">
        <p>© 2023 Powered by</p>
        <img src="{{ asset('images/static_img/logo3.jpg') }}" alt="" />
    </div>
</footer>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 class="modal_title lang">{{ __('app.btn_text1') }}</h3>
        <h4 class="modal_subtitle lang">{{ __('app.btn_text2') }}</h4>
        <input class="modal_input" type="text">
        <h4 class="modal_subtitle lang">{{ __('app.btn_text3') }}</h4>
        <input class="modal_input" type="text">
        <h4 class="modal_subtitle lang">{{ __('app.btn_text4') }}</h4>
        <input class="modal_input" type="text">
        <a href="#!" class="modal_link" id="myBtnn">Jo'natish</a>
    </div>
</div>
<div id="myModal_2" class="modal2">
    <div class="modal2-content">
        <h1 class="lang">{{ __('app.modal-text') }}</h1>
    </div>
</div>
<script src="{{ asset('js/navbar.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/lang.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/modal.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/modal-2.js') }}" type="text/javascript"></script>