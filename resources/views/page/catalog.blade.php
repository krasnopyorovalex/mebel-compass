@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@section('keywords', $page->keywords)

@section('content')

    <section class="breadcrumbs-custom">
        <div class="container">
            <div class="breadcrumbs-custom__inner">
                <p class="breadcrumbs-custom__title"></p>
                <ul class="breadcrumbs-custom__path">
                    <li><a href="{{ route('page.show') }}">Главная</a></li>
                    <li class="active">{{ $page->name }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section-md bg-default custom__content article">
        <div class="container">
            <div class="row row-60 flex-lg-row-reverse">
                <div class="col-lg-9 section-divided__main section-divided__main-left">
                    <div class="section-sm">
                        <div class="row justify-content-sm-center row-70">
                            @foreach ($catalogs as $catalog)
                                <div class="col-md-6 col-xl-4">
                                    <div class="product product-grid">
                                        @if ($catalog->image)
                                        <div class="product-img-wrap">
                                            <a href="{{ route('catalog.show', ['alias' => $catalog->alias]) }}">
                                            <img src="{{ $catalog->image->path }}" alt="{{ $catalog->image->alt }}" title="{{ $catalog->image->title }}" width="300" height="300"/>
                                            </a>
                                        </div>
                                        @endif
                                        <div class="product-caption">
                                            <div class="product-title heading-6">
                                                <a href="{{ route('catalog.show', ['alias' => $catalog->alias]) }}">{{ $catalog->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                {!! $page->text !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 section-divided__aside section__aside-left">
                    @includeWhen($catalogs, 'layouts.partials.catalog_list', ['catalogs' => $catalogs])
                </div>
            </div>
        </div>
    </section>

@endsection
