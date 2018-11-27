<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\ProductBannerRequest;
use App\Mail\ProductMainFormSent;
use Illuminate\Support\Facades\Mail;

/**
 * Class ProductBannerController
 * @package App\Http\Controllers
 */
class ProductBannerController extends Controller
{
    /**
     * @param ProductBannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ProductBannerRequest $request)
    {
        Mail::to(['hotel@mebel-compass.com'])->send(new ProductMainFormSent($request->all()));

        $request->session()->flash('status', 'Благодарим за вашу заявку. Наш менеджер свяжется с вами в ближайшее время');

        return back();
    }
}
