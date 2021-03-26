<?php

namespace App\Entities\Services\page;

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
            "title" => "nullable|string",
            "description" => "required|string",
            "store_id" => "required",
            "service_id" => "required",
            "licensor_id" => "required",

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

            'title.required' => 'title is required!',
            'description.required' => 'category description is required!',
            'store_id.required' => 'select the store from the drop down, field is required',
            'licensor_id.required' => 'select the category from the drop down, field is required',
            'service_id.required' => 'select the service from the drop down, field is required',
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