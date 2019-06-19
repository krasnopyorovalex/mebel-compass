<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSended extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * ContactFormSended constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kompas.mebel@yandex.ru')
            ->subject('Форма: страница контактов(Мебель на заказ)')
            ->view('emails.contact', [
                'data' => $this->data
            ]);
    }
}
