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

    <section class="section-md bg-default custom__contacts">
        <div class="container">
            <div class="row row-50">
                <div class="col-md-5 col-lg-4">
                    {!! $page->text !!}
                </div>
                <div class="col-md-7 col-lg-8">
                    <div class="heading-3">Контактная форма</div>
                    <!-- RD Mailform-->
                    <form class="rd-mailform rd-mailform_style-1" action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <div class="form-wrap">
                            <input class="form-input" id="contact-name" type="text" name="name" minlength="3" required>
                            <label class="form-label" for="contact-name">Ваше имя</label>
                        </div>
                        <div class="form-wrap">
                            <input class="form-input" id="contact-email" type="email" name="email" required>
                            <label class="form-label" for="contact-email">E-mail</label>
                        </div>
                        <div class="form-wrap">
                            <input class="form-input" id="contact-phone" onkeyup="this.value = this.value.replace (/[^0-9+]/, '')" type="text" name="phone" required>
                            <label class="form-label" for="contact-phone">Ваш телефон</label>
                        </div>
                        <div class="form-wrap">
                            <textarea class="form-input" id="contact-message" name="message"></textarea>
                            <label class="form-label" for="contact-message">Сообщение</label>
                        </div>
                        <button class="button button-primary" type="submit">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="map">
        <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=1732816142" width="100%" height="400" frameborder="0"></iframe>
    </section>

@endsection
