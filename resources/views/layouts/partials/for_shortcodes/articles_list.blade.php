@if ($articles)
    <div class="row justify-content-sm-center">
        <div class="col-lg-7 col-xl-8 section-divided__main">
            @foreach ($articles as $article)
                <!-- Post classic-->
                    <div class="section-sm">
                        <article class="post-classic">
                            <div class="post-classic-title">
                                <div class="heading-4"><a href="{{ route('article.show', ['alias' => $article->alias]) }}">{{ $article->name }}</a></div>
                            </div>
                            @if($article->image)
                            <a href="{{ route('article.show', ['alias' => $article->alias]) }}">
                                <img src="{{ $article->image->path }}" alt="{{ $article->image->alt }}" title="{{ $article->image->title }}" width="886" height="668"/>
                            </a>
                            @endif
                            <div class="post-meta">
                                <div class="group">
                                    <time datetime="{{ Illuminate\Support\Carbon::parse($article->published_at)->format('Y-m-d h:i:s') }}">{{ Illuminate\Support\Carbon::parse($article->published_at)->format('d M Y') }}</time>
                                </div>
                            </div>
                            <div class="post-classic-footer">
                                <a class="button button-link" href="{{ route('article.show', ['alias' => $article->alias]) }}">Подробнее</a>
                            </div>
                        </article>
                    </div>
            @endforeach
            <div class="section-sm">
                <nav>
                    {{ $articles->links() }}
                </nav>
            </div>
        </div>
    </div>
@endif
