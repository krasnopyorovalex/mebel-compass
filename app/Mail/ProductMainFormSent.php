<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductMainFormSent
 * @package App\Mail
 */
class ProductMainFormSent extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * ProductMainFormSent constructor.
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
            ->subject('Форма: хочу бесплатный проект(Мебель на заказ)')
            ->view('emails.product_banner', [
                'data' => $this->data
            ]);
    }
}
