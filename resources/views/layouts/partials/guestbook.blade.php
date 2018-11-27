<section class="section-lg bg-default text-center hidden-xs">
    <div class="container">
        <div class="heading-4"><a href="{{ route('page.show', ['alias' => 'our-guestbook']) }}">Отзывы клиентов</a></div>
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