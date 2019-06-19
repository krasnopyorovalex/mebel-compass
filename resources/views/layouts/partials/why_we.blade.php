<section class="section-lg bg-default text-center hidden-xs">
    <div class="container">
        <div class="heading-4"><a href="{{ route('page.show', ['alias' => 'o-kompanii']) }}">Почему мы?</a></div>
        <div class="row row-60 justify-content-md-center">
            @foreach ($whyWes as $whyWe)
                <div class="col-md-6 col-lg-4">
                    <!-- Blurb circle-->
                    <article class="blurb blurb-circle blurb-circle_centered">
                        <a href="{{ $whyWe->link }}">
                            <div class="blurb-circle__icon"><span class="icon linear-{{ $whyWe->icon }}"></span></div>
                            <p class="blurb__title">{{ $whyWe->name }}</p>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
