<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecallSended extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * RecallSended constructor.
     * @param $data
     */
    public function __construct($data)
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
            ->subject('Форма: ХОЧУ ПУФИК В ПОДАРОК!(Мебель на заказ)')
            ->view('emails.recall', [
                'data' => $this->data
            ]);
    }
}
