<section class="section-lg bg-default text-center">
    <div class="container">
        <div class="heading-4"><a href="{{ route('page.show', ['alias' => 'portfolio']) }}">Наши работы</a></div>
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