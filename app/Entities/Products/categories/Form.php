<?php

namespace App\Entities\Products\Categories;

use App\Helpers\FormInterface;
use Validator;

class Form implements FormInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validation()
    {
        $validator = tap(Validator::make(self::submission(), [
            "title" => "required|string",
            "description" => "required|string",
            "store_id" => "required",
            'avatar' => 'image|file|mimes:jpeg,bmp,png,jpg|max:5048',
        ]), function () {
            if (request()->has('active')) {
                Validator::make(request()->all(), [
                    'active' => 'required|numeric',
                ]);
            }

        });

        return $validator;
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [

            'sku.required' => 'promotion name is required!',
            'description.required' => 'promotion description is required!',
            'rank.required' => 'rank is required',
            'stock.numeric' => 'stock must be a number',
            'store_id.required' => 'select the store from the drop down, field is required',
            'category_id.required' => 'select the category from the drop down, field is required',
            'service_id.required' => 'select the service from the drop down, field is required',
            'unit_price.numeric.required' => 'required|between:0,99.99',
        ];
    }

    public function is_valid()
    {
        if (self::validation()->fails()) {
            return false;
        }
        return true;
    }

    public function errors()
    {
        return self::validation()->messages();
    }

//        return only validated data
    public function submission($key = null)
    {

        if (is_null($key)) {
            return request()->all();
        }

        return request()->get($key);
    }

}
