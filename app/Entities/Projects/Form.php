<?php

namespace App\Entities\Projects;

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
            "name" => "required|string",
            "description" => "required|string|min:10",
            "start_date" => "required",
            "end_date" => "required",
            "licensor_id" => "required",
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

            'name.required' => 'project name is required!',
            'description.required' => 'Description is required!',
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