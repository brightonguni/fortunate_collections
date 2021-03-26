<?php

namespace App\Entities\Stores\Banks;

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
            "name" => "required",
            "branch_code" => "required|string",

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
            'name.required' => 'Email is required!',
            'branch_code.required' => 'branch code is required!',
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