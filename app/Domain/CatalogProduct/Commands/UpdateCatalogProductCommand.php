<?php

namespace App\Domain\CatalogProduct\Commands;

use App\CatalogProductTab;
use App\Domain\CatalogProduct\Queries\GetCatalogProductByIdQuery;
use App\Events\RedirectDetected;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateCatalogProductCommand
 * @package App\Domain\CatalogProduct\Commands
 */
class UpdateCatalogProductCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateCatalogCommand constructor.
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
        $catalogProduct = $this->dispatch(new GetCatalogProductByIdQuery($this->id));
        $urlNew = $this->request->post('alias');

        if ($catalogProduct->getOriginal('alias') != $urlNew) {
            event(new RedirectDetected($catalogProduct->getOriginal('alias'), $urlNew, 'catalog_product.show'));
        }

        $catalogProduct->relativeProducts()->sync($this->request->post('products'));
        $catalogProduct->dopCatalogs()->sync($this->request->post('dopCatalogs'));

        $this->syncTabs();

        return $catalogProduct->update($this->request->all());
    }

    private function syncTabs(): void
    {
        if ($this->request->post('tabs')) {
            CatalogProductTab::where('product_id', $this->id)->delete();
            foreach ($this->request->post('tabs') as $key => $value) {
               if ($value) {
                   CatalogProductTab::create([
                       'product_id' => $this->id,
                       'tab_id' => intval($key),
                       'value' => (string)$value
                   ]);
               }
            }
        }
    }

}