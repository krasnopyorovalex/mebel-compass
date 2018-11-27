<?php

namespace Domain\ReadySolution\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateReadySolutionRequest
 * @package Domain\ReadySolution\Requests
 */
class UpdateReadySolutionRequest extends Request
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
            'is_published' => 'digits_between:0,1',
            'in_main' => 'digits_between:0,1',
            'image' => 'image',
            'imageAlt' => 'string|max:255',
            'imageTitle' => 'string|max:255',
            'price' => 'string|max:127|nullable',
            'published_at' => 'date',
            'name_btn' => 'string|max:255|nullable',
            'name_form' => 'string|max:255|nullable',
            'alias' => [
                'required',
                'max:255',
                Rule::unique('ready_solutions')->ignore($this->id)
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
            'title.required' => 'Поле «Title» обязательно для заполнения',
            'text.required' => 'Поле «Текст» обязательно для заполнения',
            'alias.required' => 'Поле «Alias» обязательно для заполнения',
            'alias.unique' => 'Значение поля «Alias» уже присутствует в базе данных',
        ];
    }
}