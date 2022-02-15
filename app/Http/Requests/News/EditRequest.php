<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // если false, то без авторизации не даст сохранить новость
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
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
            'title' => '"Наименование новости"',
            'author' => '"Автор записи"',
        ];
    }
}
