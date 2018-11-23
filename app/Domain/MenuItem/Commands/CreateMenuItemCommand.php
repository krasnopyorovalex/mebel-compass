<?php

namespace App\Domain\MenuItem\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\MenuItem;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateMenuItemCommand
 * @package App\Domain\MenuItem\Commands
 */
class CreateMenuItemCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateMenuItemCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $menuItem = new MenuItem();
        $menuItem->fill($this->request->all());

        $menuItem->save();

        if($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $menuItem->id, MenuItem::class));
        }

        return true;
    }

}