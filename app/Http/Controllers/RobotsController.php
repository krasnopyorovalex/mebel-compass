<?php

namespace App\Http\Controllers;


use App\Domain\SeoBlock\Queries\GetSeoBlockByIdQuery;

/**
 * Class RobotsController
 * @package App\Http\Controllers
 */
class RobotsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $robots = $this->dispatch(new GetSeoBlockByIdQuery(2));

        return response()
            ->view('robots.index', [
                'robots' => $robots
            ], 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
