<?php

namespace App\Entities\Recipes;

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
            'title' => 'required|string',
            'licensor_id' => 'required|numeric',
            'store_id' => 'required|numeric',
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
            'title.required' => 'this field is mandatory field required!',
            'description.required' => 'description is required!',
            'licensor_id.required' => 'select the licensor from the select box, field can not be blank',
            'store_id.required' => 'select the stores from the select box, field can not be blank',
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