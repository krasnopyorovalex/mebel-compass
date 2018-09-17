<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Административная панель управления сайтом - ООО «Красбер»</title>

    <!-- Styles -->
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/override.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.home') }}"><img src="{{ asset('dashboard/assets/images/logo.png') }}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">

        <p class="navbar-text"><span class="label bg-success">Online</span></p>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('dashboard/assets/images/placeholder.png') }}" alt="">
                    <span>{{{ Auth::user()->name }}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li>
                        <a href="#" id="logout-btn"><i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li class="navigation-header"><span>Навигация</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li><a href="{{ route('admin.pages.index') }}"><i class="icon-compose"></i> <span>Страницы</span></a></li>
                            <li><a href="{{ route('admin.about_counts.index') }}"><i class="icon-bubble-lines4"></i> <span>О нас(счётчики)</span></a></li>
                            <li><a href="{{ route('admin.ready_solutions.index') }}"><i class="icon-checkmark4"></i> <span>Готовые решения</span></a></li>
                            <li><a href="{{ route('admin.why_wes.index') }}"><i class="icon-question7"></i> <span>Почему мы?</span></a></li>
                            <li><a href="{{ route('admin.partners.index') }}"><i class="icon-collaboration"></i> <span>С кем мы работаем</span></a></li>
                            <li><a href="{{ route('admin.banners.index') }}"><i class="icon-images3"></i> <span>Баннеры</span></a></li>
                            <li><a href="{{ route('admin.services.index') }}"><i class="icon-list"></i> <span>Услуги</span></a></li>
                            <li><a href="{{ route('admin.articles.index') }}"><i class="icon-magazine"></i> <span>Статьи</span></a></li>
                            <li><a href="{{ route('admin.guestbooks.index') }}"><i class="icon-bubble2"></i> <span>Отзывы</span></a></li>
                            <li><a href="{{ route('admin.tabs.index') }}"><i class="icon-new-tab2"></i> <span>Табы для товаров</span></a></li>
                            <li><a href="{{ route('admin.catalogs.index') }}"><i class="icon-folder-open"></i> <span>Категории каталога</span></a></li>
                            <li><a href="{{ route('admin.menus.index') }}"><i class="icon-lan2"></i> <span>Навигация</span></a></li>
                            <li><a href="{{ route('admin.galleries.index') }}"><i class="icon-images3"></i> <span>Фотогалерея</span></a></li>
                            <li><a href="{{ route('admin.sliders.index') }}"><i class="icon-images2"></i> <span>Слайдер</span></a></li>
                            <li><a href="{{ route('admin.seo_blocks.index') }}"><i class="icon-markup"></i> <span>SEO-блоки</span></a></li>
                            <li><a href="{{ route('admin.text_blocks.index') }}"><i class="icon-stack2"></i> <span>Текстовые-блоки</span></a></li>
                            <li><a href="{{ route('admin.redirects.index') }}"><i class="icon-transmission"></i> <span>Редиректы</span></a></li>
                            <!-- /main -->

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> Главная</a></li>
                        @section('breadcrumb')
                            <li class="active">Пропишите хлебные крошки</li>
                        @show
                    </ul>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                @yield('content')

                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; <a href="https://krasber.ru" target="_blank">ООО «Красбер»</a> 2017 - {{ date('Y') }}
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<!-- Scripts -->
<script src="{{ asset('dashboard/assets/js/jquery.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/plugins/loaders/pace.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/core/libraries/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/plugins/loaders/blockui.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/plugins/forms/styling/uniform.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/plugins/notifications/pnotify.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/core/libraries/jquery_ui/interactions.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/plugins/forms/selects/select2.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/core/app.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/core/user_scripts.js') }}" defer></script>
@stack('scripts')
</body>
</html>