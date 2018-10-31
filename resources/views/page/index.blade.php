@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@section('keywords', $page->keywords)

@section('content')

    @includeWhen($page->slider, 'layouts.partials.slider', ['page' => $page])

    @includeWhen($readySolutions, 'layouts.partials.ready_solutions', ['readySolutions' => $readySolutions])

    @includeWhen($countAbout, 'layouts.partials.count_about', ['countAbout' => $countAbout])

    @if ($banners->get(1))
    <section class="section-limit bg-gray-lighter bg-image" style="background-image: url({{ $banners->get(1)->image->path }})">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4 section-lg">
                    <div class="wow fadeInUpSmall heading-2" data-wow-delay=".2s" data-wow-duration="1.2s">{{ $banners->get(1)->name }}</div>
                    <p class="big wow fadeInUpSmall" data-wow-delay=".5s" data-wow-duration="1.2s">{{ strip_tags($banners->get(1)->text) }}</p>
                    <a class="banner-link wow fadeInUpSmall" href="{{ $banners->get(1)->link }}" data-wow-delay=".7s" data-wow-duration="1.2s">{{ $banners->get(1)->btn_text }}</a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="section-lg bg-default">
        <div class="container text-center">
            <div class="heading-4">
                <a href="{{ route('page.show', ['alias' => 'гостиничная-мебель']) }}">Гостиничная мебель</a>
            </div>
            <!-- Bootstrap tabs-->
            <div class="tabs-custom tabs-vertical row no-gutters">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs nav-custom nav-custom-tabs col-md-3">
                    @foreach ($catalogs as $catalog)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('catalog.show', ['alias' => $catalog->alias]) }}">{{ $catalog->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content text-left col-md-9">
                    <div class="tab-pane fade show active">
                        <!-- Owl Carousel-->
                        <div class="owl-carousel carousel-product" data-items="1" data-md-items="1" data-lg-items="2" data-xl-items="3" data-stage-padding="0" data-loop="false" data-margin="50" data-mouse-drag="false" data-nav="true">
                            @foreach ($catalogs as $catalog)
                            <div class="item">
                                <div class="product product-grid">
                                    <div class="product-img-wrap">
                                        <a href="{{ route('catalog.show', ['alias' => $catalog->alias]) }}">
                                            <img src="{{ $catalog->image->path }}" alt="{{ $catalog->image->alt }}" title="{{ $catalog->image->title }}" width="300" height="300"/>
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <p>{{ $catalog->sub_title }}</p>
                                        <div class="product-title heading-6"><a href="{{ route('catalog.show', ['alias' => $catalog->alias]) }}">{{ $catalog->name }}</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="recall__me hidden-xs">
        <div class="title__form heading-4">Хочу пуфик в подарок!</div>
        <form action="{{ route('recall.send') }}" method="post" id="recall-form">
            @csrf
            <div class="form-group form-wrap_icon linear-icon-man">
                <input type="text" class="name__filed form-input" value="" placeholder="Ваше имя" name="name" required>
            </div>
            <div class="form-group form-wrap_icon linear-icon-telephone">
                <input type="text" class="email__field form-input" value="" onkeyup="this.value = this.value.replace (/[^0-9+]/, '')" placeholder="Ваш телефон" name="phone" required>
            </div>
            <div class="form-group">
                <button class="button button-black" type="submit">Отправить</button>
            </div>
        </form>
    </section>
    <!-- /.recall__me -->

    <!-- Divider-->
    <div class="container">
        <div class="divider"></div>
    </div>

    @includeWhen($galleries, 'layouts.partials.our_works', ['galleries' => $galleries])

    <!-- Divider-->
    <div class="container">
        <div class="divider"></div>
    </div>

    @includeWhen($whyWes, 'layouts.partials.why_we', ['whyWes' => $whyWes])

    @if ($banners->get(2))
    <section class="section-limit bg-gray-lighter bg-image hidden-xs" style="background-image: url({{ $banners->get(2)->image->path }});min-height: 450px">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-5 section-lg">
                    <div class="wow fadeInUpSmall heading-2" data-wow-delay=".2s" data-wow-duration="1.2s">{{ $banners->get(2)->name }}</div>
                    <p class="big wow fadeInUpSmall" data-wow-delay=".5s" data-wow-duration="1.2s">{{ strip_tags($banners->get(2)->text) }}</p>
                    <a class="banner-link wow fadeInUpSmall" href="{{ $banners->get(2)->link }}" data-wow-delay=".7s" data-wow-duration="1.2s">{{ $banners->get(2)->btn_text }}</a>
                </div>
            </div>
        </div>
    </section>
    @endif

    @includeWhen($guestbook, 'layouts.partials.guestbook', ['guestbook' => $guestbook])

    <section class="section-lg bg-default text-center hidden-xs">
        <div class="container">
            <div class="heading-4"><a href="{{ route('page.show', ['alias' => 'мебель-под-заказ-статьи']) }}">Статьи о мебели</a></div>
            <div class="row row-60 justify-content-md-center">

                @foreach ($articles as $article)
                    <div class="col-md-6 col-lg-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal text-center">
                            <img src="{{ $article->image->path }}" alt="{{ $article->image->alt }}" title="{{ $article->image->title }}" width="418" height="315"/>
                            <div class="post-classic-title">
                                <div class="heading-6"><a href="{{ route('article.show', ['alias' => $article->alias]) }}">{{ $article->name }}</a></div>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <time datetime="{{ Illuminate\Support\Carbon::parse($article->published_at)->format('Y-m-d h:i:s') }}">{{ Illuminate\Support\Carbon::parse($article->published_at)->format('d M Y') }}</time>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @if (count($partners))
    <section class="section-lg bg-default partners__box">
        <div class="container text-center">
            <div class="heading-4">
                Наши клиенты
            </div>
            <!-- Bootstrap tabs-->
            <div class="tabs-custom tabs-vertical row no-gutters">
                <div class="tab-content text-left col-md-12">
                    <div class="tab-pane fade show active">
                        <!-- Owl Carousel-->
                        <div class="owl-carousel carousel-product" data-items="1" data-md-items="3" data-lg-items="5" data-xl-items="5" data-stage-padding="0" data-loop="false" data-margin="50" data-mouse-drag="false" data-nav="true">
                            @foreach ($partners as $partner)
                                <div class="item">
                                    <div class="product product-grid">
                                        <div class="product-img-wrap">
                                            <img src="{{ $partner->image->path }}" alt="{{ $partner->image->alt }}" title="{{ $partner->image->title }}" width="300" height="300"/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Divider-->
    <div class="container">
        <div class="divider"></div>
    </div>

    <section class="section-sm bg-default content">
        <div class="container">
            <div class="row row-60 justify-content-md-center">
                <div class="col-md-12 col-lg-12">
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </section>

    <section class="section-map">
        <script type="text/javascript" charset="utf-8" async="" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Mzb64TxnY02RHItjvDXPjd2n8H3WmkRV&amp;width=100%&amp;height=451&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
    </section>
@endsection