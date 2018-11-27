<?php

namespace Domain\ReadySolution\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateReadySolutionRequest
 * @package Domain\ReadySolution\Requests
 */
class CreateReadySolutionRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'name_image' => 'string|max:255|nullable',
            'title' => 'required|max:512',
            'description' => 'max:512|nullable',
            'keywords' => 'max:512|nullable',
            'text' => 'required|string',
            'alias' => 'required|max:255|unique:pages',
            'price' => 'string|max:127|nullable',
            'is_published' => 'digits_between:0,1',
            'in_main' => 'digits_between:0,1',
            'image' => 'image',
            'published_at' => 'date',
            'name_btn' => 'string|max:255|nullable',
            'name_form' => 'string|max:255|nullable'
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
            'title.required' => 'Поле «Title» обязательно для заполнения',
            'text.required' => 'Поле «Текст» обязательно для заполнения',
            'alias.required' => 'Поле «Alias» обязательно для заполнения',
            'alias.unique' => 'Значение поля «Alias» уже присутствует в базе данных',
        ];
    }
}