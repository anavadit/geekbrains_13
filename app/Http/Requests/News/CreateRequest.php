<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Сюда пишут "тонкие" настройки - есть ли доступ конкретного пользака к этой форме. В проекте где много ролей(подролей)
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5'],
            'category_id' => ['required', 'integer'],
            'author' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpg,png'],
            'description' => ['nullable', 'string', 'max:1000'],
            'display' => ['nullable', 'boolean']
        ];
    }

    public function messages(): array {
        // return parent::messages();
        return [
            'required' => '"Необходимо заполнение поля :attribute."',
        ];
    }

    public function attributes(): array {
        // return parent::attributes();
        return [
            'title' => '"Заголовок"',
            'author' => '"Автор новости"',
        ];
    }
}
