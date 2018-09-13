<?php

namespace Domain\TextBlock\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateTextBlockRequest
 * @package Domain\TextBlock\Requests
 */
class UpdateTextBlockRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|string|max:64',
            'text' => 'required|string',
            'sys_name' => [
                'required',
                'string',
                'max:32',
                Rule::unique('text_blocks')->ignore($this->id)
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'text.required' => 'Поле «Текст» обязательно для заполнения',
            'sys_name.required' => 'Поле «Системное имя» обязательно для заполнения'
        ];
    }
}