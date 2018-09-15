<?php

namespace Domain\AboutCount\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateAboutCountRequest
 * @package Domain\AboutCount\Requests
 */
class CreateAboutCountRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:255',
            'count' => 'required|integer',
            'postfix' => 'string|max:32|nullable',
            'icon' => 'required|string|max:32',
            'pos' => 'integer|min:0|max:255'
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
            'count.required' => 'Поле «Количество» обязательно для заполнения',
            'icon.required' => 'Поле «Иконка» обязательно для заполнения'
        ];
    }
}