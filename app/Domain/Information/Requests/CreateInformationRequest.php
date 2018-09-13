<?php

namespace Domain\Information\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateInformationRequest
 * @package Domain\Information\Requests
 */
class CreateInformationRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'title' => 'required|max:512',
            'description' => 'max:512|nullable',
            'keywords' => 'max:512|nullable',
            'text' => 'required|string',
            'alias' => 'required|max:255|unique:informations',
            'is_published' => 'digits_between:0,1',
            'image' => 'image',
            'published_at' => 'date'
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
            'title.required'  => 'Поле «Title» обязательно для заполнения',
            'text.required'  => 'Поле «Текст» обязательно для заполнения',
            'alias.required'  => 'Поле «Alias» обязательно для заполнения',
            'alias.unique'  => 'Значение поля «Alias» уже присутствует в базе данных',
        ];
    }
}