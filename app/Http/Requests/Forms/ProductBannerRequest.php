<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class ProductBannerRequest
 * @package App\Http\Requests\Forms
 */
class ProductBannerRequest extends Request
{
    public function rules(): array
    {
        return [
            'product' => 'string',
            'phone' => 'required|string|min:5',
            'email' => 'required|email'
        ];
    }
}