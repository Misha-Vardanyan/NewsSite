<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
        $tableNameCategory  = (new Category())->getTable();

       return[
            'title' => "required|min:5|max:150",
            'text' =>'required|min:10',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'image' => 'mimes:jpeg,png,bmp|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Вы забыли заполнить :attribute',
            'title.min' => 'Мало букв в поле :attribute',

        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => 'Категория новости',
            'image' => 'Изображение'
        ];
    }

}
