<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatebookRequest extends FormRequest
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
        return [
            //
            "category_id" => 'required',
            "publisher_id" => 'required',
            "title" => 'required|min:3|max:255',
            "isbn" => 'required|alpha_num',
            "desc" => 'required|min:25|max:2500',
            "publish_year" => 'required|date',
            "number_of_pages" => 'required|numeric',
            "number_of_copies" => 'required|numeric',
            "price" => 'required|numeric',
            "cover_image" => 'image|mimes:png,jpg',
            "authors" => 'nullable'
        ];
    }
}
