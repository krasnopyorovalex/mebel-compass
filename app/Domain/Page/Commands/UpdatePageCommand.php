<?php

namespace App\Domain\Page\Commands;

use App\Domain\Page\Queries\GetPageByIdQuery;
use App\Events\RedirectDetected;
use App\Http\Requests\Request;
use App\Page;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdatePageCommand
 * @package App\Domain\Page\Commands
 */
class UpdatePageCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdatePageCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $page = $this->dispatch(new GetPageByIdQuery($this->id));
        $urlNew = $this->request->post('alias');

        if ($page->getOriginal('alias') !== $urlNew) {
            event(new RedirectDetected($page->getOriginal('alias'), str_slug($urlNew)));
        }

        return $page->update($this->request->all());
    }

}
