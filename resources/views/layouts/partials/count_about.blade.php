<section class="section-lg bg-default text-center hidden-xs">
    <div class="container">
        <div class="title"><a href="{{ route('page.show', ['alias' => 'mebel-dlya-gostinits-ot-proizvoditelya']) }}">О нас</a></div>
        <div class="row justify-content-md-center row-50">
            @foreach ($countAbout as $ca)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <!-- Box counter-->
                    <article class="box-counter">
                        <div class="box-counter__icon linear-{{ $ca->icon }}"></div>
                        <div class="box-counter__wrap">
                            <div class="counter">{{ $ca->count }}</div>
                            @if ($ca->postfix)
                                <span>{{ $ca->postfix }}</span>
                            @endif
                        </div>
                        <p class="box-counter__title">{{ $ca->name }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>