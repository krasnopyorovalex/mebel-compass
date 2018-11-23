<?php

namespace App\Domain\MenuItem\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\MenuItem\Queries\GetMenuItemByIdQuery;
use App\Http\Requests\Request;
use App\MenuItem;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateMenuItemCommand
 * @package App\Domain\MenuItem\Commands
 */
class UpdateMenuItemCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateMenuItemCommand constructor.
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
        $menuItem = $this->dispatch(new GetMenuItemByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($menuItem->image) {
                $this->dispatch(new DeleteImageCommand($menuItem->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $menuItem->id, MenuItem::class));
        }

        return $menuItem->update($this->request->all());
    }
}