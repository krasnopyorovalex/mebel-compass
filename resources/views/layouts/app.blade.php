<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Site Title-->
    <title>@yield('title', 'Мебель для гостиниц')</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', '')">
    <link rel="canonical" href="{{ request()->url() }}"/>
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Libre+Franklin:200,300,500,600,300italic%7CCormorant+Garamond:300,400,400i,600,700">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('css')
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <![endif]-->
    {!! $seoBlocks->get('metrika') !!}
</head>
<body>
<!-- Page-->
<div class="page">
    <!--END PANEL-->
    <div class="preloader">
        <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
    </div>
    <header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar_transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-lg-stick-up-offset="120px" data-xl-stick-up-offset="35px" data-xxl-stick-up-offset="35px" data-body-class="rd-navbar-absolute">
                <!-- RD Navbar Top Panel-->
                <div class="rd-navbar-top-panel">
                    <div class="rd-navbar-top-panel__main">
                        <div class="rd-navbar-top-panel__toggle rd-navbar-fixed__element-1 rd-navbar-static--hidden" data-rd-navbar-toggle=".rd-navbar-top-panel__main"><span></span></div>
                        <div class="rd-navbar-top-panel__content">
                            <ul class="rd-navbar-items-list">
                                <li>
                                    {!! $textBlocks->get('header_phones') !!}
                                </li>
                                <li>
                                    {!! $textBlocks->get('header_socials') !!}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="rd-navbar-inner rd-navbar-search-wrap">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel rd-navbar-search_collapsable">
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand"><a class="brand-name" href="{{ route('page.show') }}"><img src="{{ asset('images/logo.png') }}" alt="" width="140" height="44"/></a></div>
                    </div>
                    <!-- RD Navbar Nav-->
                    <div class="rd-navbar-nav-wrap rd-navbar-search_not-collapsable">
                        <div class="rd-navbar-search_collapsable">
                            @includeWhen($menu->get('menu_main'), 'layouts.partials.header_menu', ['menu' => $menu])
                            <div class="sticky__contacts">
                                {!! $textBlocks->get('header_phones') !!}
                            </div>
                            <!-- /.sticky__contacts -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <!-- Page Footer -->
    <section class="pre-footer-corporate">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-lg-start row-30 row-md-60">
                <div class="col-sm-10 col-md-6 col-lg-10 col-xl-3">
                    {!! $textBlocks->get('footer_text') !!}
                </div>
                <div class="col-sm-10 col-md-6 col-lg-3 col-xl-3">
                    @includeWhen($menu->get('menu_footer'), 'layouts.partials.footer_menu', ['menu' => $menu])
                </div>
                <div class="col-sm-10 col-md-6 col-lg-5 col-xl-3">
                    <div class="heading-6">Наш адрес:</div>
                    <script type="text/javascript" charset="utf-8" async="" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Mzb64TxnY02RHItjvDXPjd2n8H3WmkRV&amp;width=100%&amp;height=250&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3">
                    {!! $textBlocks->get('footer_contacts') !!}
                    <div class="ya-site-form ya-site-form_inited_no" data-bem="{&quot;action&quot;:&quot;https://yandex.ru/search/site/&quot;,&quot;arrow&quot;:false,&quot;bg&quot;:&quot;transparent&quot;,&quot;fontsize&quot;:12,&quot;fg&quot;:&quot;#000000&quot;,&quot;language&quot;:&quot;ru&quot;,&quot;logo&quot;:&quot;rb&quot;,&quot;publicname&quot;:&quot;Поиск по сайту mebel-compass.com&quot;,&quot;suggest&quot;:true,&quot;target&quot;:&quot;_blank&quot;,&quot;tld&quot;:&quot;ru&quot;,&quot;type&quot;:2,&quot;usebigdictionary&quot;:true,&quot;searchid&quot;:2349461,&quot;input_fg&quot;:&quot;#000000&quot;,&quot;input_bg&quot;:&quot;#ffffff&quot;,&quot;input_fontStyle&quot;:&quot;normal&quot;,&quot;input_fontWeight&quot;:&quot;normal&quot;,&quot;input_placeholder&quot;:null,&quot;input_placeholderColor&quot;:&quot;#000000&quot;,&quot;input_borderColor&quot;:&quot;#7f9db9&quot;}"><form action="https://yandex.ru/search/site/" method="get" target="_blank" accept-charset="utf-8"><input type="hidden" name="searchid" value="2349461"/><input type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value=""/><input type="search" name="text" value=""/><input type="submit" value="Найти"/></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-corporate">
        <div class="container">
            <div class="footer-corporate__inner">
                {!! $textBlocks->get('footer_copyright') !!}
                {!! $textBlocks->get('footer_socials') !!}
            </div>
        </div>
    </footer>
</div>
@if (session('status'))
    <!-- Global Mailform Output-->
    <div class="snackbars active success" id="form-output-global">
        <span class="close" title="Закрыть окно">x</span>
        <p class="snackbars-left"><span class="icon icon-xxs mdi mdi-alert-outline text-middle"></span><span>Благодарим за вашу заявку. Наш менеджер свяжется с вами в ближайшее время</span></p>
    </div>
@endif
<!-- Javascript-->
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>
