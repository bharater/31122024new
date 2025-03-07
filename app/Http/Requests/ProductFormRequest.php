<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id'=>[
                'required',
                'integer'
            ],

            'name'=>[
                'required',
                'string'
            ],
            'slug'=>[
                'required',
                'string',
                'max:255'
            ],
            'brand'=>[
                'required',
                'string',
                'max:255'
            ],
            'small_description'=>[
                'required',
                'string'
            ],
            'description'=>[
                'required',
                'string'
            ],
            'original_price'=>[
                'nullable',
                'integer'
            ],
            'selling_price'=>[
                'nullable',
                'integer'
            ],
            'quantity'=>[
                'required',
                'nullable'
            ],

            'trending'=>[
                'nullable',
            ],
            'status'=>[
                'nullable',
            ],
            'meta_title'=>[
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword'=>[
                'required',
                'string',
            ],
            'meta_description'=>[
                'required',
                'string',
            ],
            'image'=>[
                'nullable',
                // 'image|mimes:png,jpg,jpeg'
            ],
            'price.*' => ['required', 'numeric', 'min:0'],
          'quantity.*' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
