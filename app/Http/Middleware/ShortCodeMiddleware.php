<?php

namespace App\Http\Middleware;

use App\Domain\Article\Queries\GetAllArticlesQuery;
use App\Domain\Catalog\Queries\GetAllCatalogsQuery;
use App\Domain\Gallery\Queries\GetAllGalleriesQuery;
use App\Domain\Guestbook\Queries\GetAllGuestbookQuery;
use App\Domain\Page\Queries\GetAllPagesQuery;
use App\Domain\ReadySolution\Queries\GetAllReadySolutionsQuery;
use App\Domain\WhyWe\Queries\GetAllWhyWesQuery;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ShortCodeMiddleware
{
    use DispatchesJobs;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var $response Response */
        $response = $next($request);

        if ( ! method_exists($response, 'content')) {
            return $response;
        }

        $content = preg_replace_callback_array(
            [
                '#(<p(.*)>)?{articles}(<\/p>)?#' => function () {
                    $articles = $this->dispatch(new GetAllArticlesQuery(false, true));

                    return view('layouts.partials.for_shortcodes.articles_list', ['articles' => $articles]);
                },
                '#(<p(.*)>)?{portfolio}(<\/p>)?#' => function () {
                    $portfolios = $this->dispatch(new GetAllGalleriesQuery(true));

                    return view('layouts.partials.for_shortcodes.portfolio_list', ['portfolios' => $portfolios]);
                },
                '#(<p(.*)>)?{actions}(<\/p>)?#' => function () {
                    $readySolutions = $this->dispatch(new GetAllReadySolutionsQuery(false, true));

                    return view('layouts.partials.ready_solutions', ['readySolutions' => $readySolutions]);
                },
                '#(<p(.*)>)?{our_works}(<\/p>)?#' => function () {
                    $galleries = $this->dispatch(new GetAllGalleriesQuery(true));

                    return view('layouts.partials.our_works', ['galleries' => $galleries]);
                },
                '#(<p(.*)>)?{why_wes}(<\/p>)?#' => function () {
                    $whyWes = $this->dispatch(new GetAllWhyWesQuery());

                    return view('layouts.partials.why_we', ['whyWes' => $whyWes]);
                },
                '#(<p(.*)>)?{guestbook}(<\/p>)?#' => function () {
                    $guestbook = $this->dispatch(new GetAllGuestbookQuery(3));

                    return view('layouts.partials.guestbook', ['guestbook' => $guestbook]);
                },
                '#(<p(.*)>)?{sitemap}(<\/p>)?#' => function () {
                    $pages = $this->dispatch(new GetAllPagesQuery(true));
                    $readySolutions = $this->dispatch(new GetAllReadySolutionsQuery(false, true));
                    $articles = $this->dispatch(new GetAllArticlesQuery(false, false, true));
                    $catalogs = $this->dispatch(new GetAllCatalogsQuery());

                    return view('layouts.partials.for_shortcodes.sitemap', [
                        'pages' => $pages,
                        'readySolutions' => $readySolutions,
                        'articles' => $articles,
                        'catalogs' => $catalogs
                    ]);
                }
            ],
            $response->content()
        );

        $response->setContent($content);

        return $response;
    }
}
