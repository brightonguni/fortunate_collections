<?php

namespace App\Entities\Stores\Contacts;

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

            "user_id" => "required",
            "store_id" => "required",
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

//            "contactPerson.alpha" => "contain alphanumeric characters and ‘_’, ’ ‘, ‘-‘, or ‘.’.!",
        ];
    }

    public function is_valid($edit = false)
    {
        if (self::validation($edit)->fails()) {
            return false;
        }
        return true;
    }

    public function errors($edit = false)
    {
        return self::validation($edit)->messages();
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