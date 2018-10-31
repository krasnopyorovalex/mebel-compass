<section class="section-limit ready__solutions">
    <div class="title"><a href="{{ route('page.show', ['alias' => 'actions']) }}">Акции</a></div>
    <div class="row justify-content-sm-center row-50">
        @foreach ($readySolutions as $readySolution)
            <div class="col-md-4">
                <div class="banner-thumbnail banner-thumbnail-top">
                    @if ($readySolution->image)
                    <a href="{{ route('ready_solution.show', ['alias' => $readySolution->alias]) }}">
                        <img src="{{ $readySolution->image->path }}" alt="{{ $readySolution->image->alt }}" title="{{ $readySolution->image->title }}" width="573" height="432"/>
                    </a>
                    @endif
                    @if ($readySolution->name_image)
                        <div class="rs__name">
                            <a href="{{ route('ready_solution.show', ['alias' => $readySolution->alias]) }}">{{ $readySolution->name_image }}</a>
                        </div>
                        <!-- /.rs__name -->
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>