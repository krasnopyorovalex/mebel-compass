<?php

namespace App\Http\Controllers;

use App\Domain\CatalogProduct\Queries\GetCatalogProductByAliasQuery;
use App\Mail\ProductOrdered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class CatalogProductController
 * @package App\Http\Controllers
 */
class CatalogProductController extends Controller
{

    /**
     * @param string $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $alias)
    {
        $product = $this->dispatch(new GetCatalogProductByAliasQuery($alias));

        $product->tabs = $product->tabs->mapWithKeys(function ($item) {
            return [$item->tab_id => $item->value];
        });

        return view('product.index', [
            'product' => $product
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        Mail::to(['hotel@mebel-compass.com','va@mebel-compass.com'])->send(new ProductOrdered($request->all()));

        $request->session()->flash('status', 'Благодарим за вашу заявку. Наш менеджер свяжется с вами в ближайшее время');

        return back();
    }
}
