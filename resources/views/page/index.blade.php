@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@section('keywords', $page->keywords)

@section('content')

    @includeWhen($page->slider, 'layouts.partials.slider', ['page' => $page])

    @includeWhen($readySolutions, 'layouts.partials.ready_solutions', ['readySolutions' => $readySolutions])

    @includeWhen($countAbout, 'layouts.partials.count_about', ['countAbout' => $countAbout])

    <section class="section-limit bg-gray-lighter bg-image css__custom-banner" style="background-image: url({{ $banners->get(1)->image->path }})">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-5 section-lg">
                    <div class="wow fadeInUpSmall heading-2" data-wow-delay=".2s" data-wow-duration="1.2s">{{ $banners->get(1)->name }}</div>
                    <p class="big wow fadeInUpSmall" data-wow-delay=".5s" data-wow-duration="1.2s">{{ strip_tags($banners->get(1)->text) }}</p>
                    <a class="banner-link wow fadeInUpSmall" href="{{ $banners->get(1)->link }}" data-wow-delay=".7s" data-wow-duration="1.2s">{{ $banners->get(1)->btn_text }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-lg bg-default">
        <div class="container text-center">
            <div class="heading-4">
                <a href="{{ route('page.show', ['alias' => 'catalog']) }}">Каталог мебели</a>
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

    <section class="recall__me">
        <div class="title__form heading-4">Перезвоните мне</div>
        <form action="{{ route('recall.send') }}" method="post" id="recall-form">
            @csrf
            <div class="form-group form-wrap_icon linear-icon-man">
                <input type="text" class="name__filed form-input" value="" placeholder="Ваше имя" name="name" required>
            </div>
            <div class="form-group form-wrap_icon linear-icon-envelope">
                <input type="email" class="email__field form-input" value="" placeholder="Ваш e-mail" name="email" required>
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

    <section class="section-lg bg-default text-center">
        <div class="container">
            <div class="heading-4"><a href="{{ route('page.show', ['alias' => 'gallery']) }}">Наши работы</a></div>
            <div class="row row-60">
                @foreach ($galleries as $gallery)
                    <div class="col-md-6 col-xl-3">
                        <!-- Thumb corporate-->
                        <div class="thumb thumb-corporate">
                            <div class="thumb-corporate__main">
                                <a href="{{ route('page.show', ['alias' => 'portfolio']) }}#portfolio-{{ $gallery->id }}">
                                    <img src="{{ $gallery->image->path }}" alt="{{ $gallery->image->alt }}" title="{{ $gallery->image->title }}" width="301" height="301"/>
                                </a>
                            </div>
                            <div class="thumb-corporate__caption">
                                <p class="thumb__title"><a href="{{ route('page.show', ['alias' => 'portfolio']) }}#portfolio-{{ $gallery->id }}">{{ $gallery->name }}</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Divider-->
    <div class="container">
        <div class="divider"></div>
    </div>

    @includeWhen($whyWes, 'layouts.partials.why_we', ['whyWes' => $whyWes])

    <section class="section-limit bg-gray-lighter bg-image css__custom-banner" style="background-image: url({{ $banners->get(1)->image->path }})">
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

    @if (count($guestbook))
        <section class="section-lg bg-default text-center">
            <div class="container">
                <div class="heading-4"><a href="{{ route('page.show', ['alias' => 'guestbook']) }}">Отзывы клиентов</a></div>
                <div class="row row-50">

                    @foreach ($guestbook as $guestbookItem)
                        <div class="col-md-6 col-lg-4">
                            <!-- Quote default-->
                            <div class="quote-default quote-default_left-v2">
                                <div class="quote-default__image">
                                    <img src="{{ $guestbookItem->image->path }}" alt="{{ $guestbookItem->image->alt }}" title="{{ $guestbookItem->image->title }}" width="120" height="120">
                                </div>
                                <svg class="quote-default__mark" version="1.1" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484" xml:space="preserve">
                                  <g>
                                      <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959              c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246              c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885              c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723              c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984              c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635              s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                  </g>
                            </svg>
                                <div class="quote-default__text">
                                    <p class="q">
                                        {!! $guestbookItem->text !!}
                                    </p>
                                </div>
                                <p class="quote-default__cite">{{ $guestbookItem->name }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    <section class="section-lg bg-default text-center">
        <div class="container">
            <div class="heading-4"><a href="{{ route('page.show', ['alias' => 'articles']) }}">Статьи/О мебели</a></div>
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
                С нами работают
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
            <div class="text-center">
                <h1>{{ $page->name }}</h1>
            </div>
            <div class="row row-60 justify-content-md-center">
                <div class="col-md-12 col-lg-12">
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </section>

    {{--<section class="section-map">--}}
        {{--<script type="text/javascript" charset="utf-8" async="" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Mzb64TxnY02RHItjvDXPjd2n8H3WmkRV&amp;width=100%&amp;height=451&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>--}}
    {{--</section>--}}
@endsection