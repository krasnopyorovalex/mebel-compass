<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\PluginRequest;
use App\Mail\PluginSended;
use Illuminate\Support\Facades\Mail;

/**
 * Class PluginController
 * @package App\Http\Controllers
 */
class PluginController extends Controller
{
    /**
     * @param PluginRequest $request
     * @return array
     */
    public function send(PluginRequest $request)
    {
        Mail::to(['hotel@mebel-compass.com','va@mebel-compass.com'])->send(new PluginSended($request->all()));

        return [
            'message' => 'Благодарим за вашу заявку. Наш менеджер свяжется с вами в ближайшее время',
            'status' => 'success'
        ];
    }
}
