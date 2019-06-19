<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\ContactRequest;
use App\Mail\ContactFormSended;
use Illuminate\Support\Facades\Mail;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ContactRequest $request)
    {
        Mail::to(['hotel@mebel-compass.com','va@mebel-compass.com'])->send(new ContactFormSended($request->all()));

        $request->session()->flash('status', 'Благодарим за вашу заявку. Наш менеджер свяжется с вами в ближайшее время');

        return back();
    }
}
