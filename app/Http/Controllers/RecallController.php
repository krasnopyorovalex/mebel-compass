<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\RecallRequest;
use App\Mail\RecallSended;
use Illuminate\Support\Facades\Mail;

/**
 * Class RecallController
 * @package App\Http\Controllers
 */
class RecallController extends Controller
{
    /**
     * @param RecallRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(RecallRequest $request)
    {
        Mail::to(['djShtaket88@mail.ru'])->send(new RecallSended($request->all()));

        $request->session()->flash('status', 'Благодарим за вашу заявку. Наш менеджер свяжется с вами в ближайшее время');

        return back();
    }
}
