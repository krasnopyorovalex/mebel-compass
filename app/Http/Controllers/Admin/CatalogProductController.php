<?php

namespace App\Http\Controllers\Admin;

use App\CatalogProduct;
use App\Domain\CatalogProduct\Commands\CreateCatalogProductCommand;
use App\Domain\CatalogProduct\Commands\DeleteCatalogProductCommand;
use App\Domain\CatalogProduct\Commands\UpdateCatalogProductCommand;
use App\Domain\CatalogProduct\Queries\GetAllCatalogProductsQuery;
use App\Domain\CatalogProduct\Queries\GetCatalogProductByIdQuery;
use App\Http\Controllers\Controller;
use Domain\CatalogProduct\Requests\CreateCatalogProductRequest;
use Domain\CatalogProduct\Requests\UpdateCatalogProductRequest;
use Illuminate\Http\Request;

/**
 * Class CatalogProductController
 * @package App\Http\Controllers\Admin
 */
class CatalogProductController extends Controller
{
    /**
     * @param int $catalog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(int $catalog)
    {
        $catalogProducts = $this->dispatch(new GetAllCatalogProductsQuery($catalog));

        return view('admin.catalog_products.index', [
            'catalogProducts' => $catalogProducts,
            'catalog' => $catalog
        ]);
    }

    /**
     * @param $catalog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($catalog)
    {
        $catalogProducts = $this->dispatch(new GetAllCatalogProductsQuery($catalog));
        $catalogProduct = new CatalogProduct();

        return view('admin.catalog_products.create', [
            'catalog' => $catalog,
            'catalogProducts' => $catalogProducts,
            'labels' => $catalogProduct->getLabels()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCatalogProductRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCatalogProductRequest $request)
    {
        $this->dispatch(new CreateCatalogProductCommand($request));

        return redirect(route('admin.catalog_products.index',[
            'catalog' => intval($request->get('catalog_id'))
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogProduct = $this->dispatch(new GetCatalogProductByIdQuery($id));
        $catalogProducts = $this->dispatch(new GetAllCatalogProductsQuery($catalogProduct->catalog_id, $catalogProduct->id));

        $catalogProductRelatives = get_ids_from_array($catalogProduct->relativeProducts->toArray());

        return view('admin.catalog_products.edit', [
            'catalogProduct' => $catalogProduct,
            'catalogProducts' => $catalogProducts,
            'catalogProductRelatives' => $catalogProductRelatives
        ]);
    }

    /**
     * @param $id
     * @param UpdateCatalogProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateCatalogProductRequest $request)
    {
        $this->dispatch(new UpdateCatalogProductCommand($id, $request));
        $catalogProduct = $this->dispatch(new GetCatalogProductByIdQuery($id));

        return redirect(route('admin.catalog_products.index', [
            'catalog' => $catalogProduct->catalog_id
        ]));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Request $request)
    {
        $this->dispatch(new DeleteCatalogProductCommand($id));

        return redirect(route('admin.catalog_products.index', [
            'catalog' => $request->post('catalog_id')
        ]));
    }
}
