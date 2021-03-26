<?php

namespace App\Entities\Stores;

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
            "description" => "required|string",
            "email" => 'required|email|unique:stores,email,' . self::submission('store_id') . '|max:255',
            "phone" => 'sometimes',
            "website" => "nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",
            // "address" => "required|string",
            "logo" => 'image|file|mimes:jpeg,bmp,jpg,png|max:2048',
            'categories' => 'required',
            'hours' => 'required',
        ]), function () {

            if (request()->has('active')) {
                Validator::make(request()->all(), [
                    'active' => 'required|numeric',
                ]);
            }

            $phone = str_replace(' ', '', request()->get('phone'));

            if (request()->has('phone')) {
                Validator::make(['phone' => $phone], [
                    'phone' => 'required|regex:/(0)[0-9]{9}/',
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
            'email.required' => 'Email is required!',
            'description.required' => 'Bio is required!',
            'website.required' => 'Website url is required!',
            'website.regex' => 'The website url provided is not valid',
            'pin.required' => 'Pin is required',
            'pin.numeric' => 'Pin can only contain numeric values',
            'phone.required' => 'Phone Number is required!',
            'phone.digits' => 'Phone Number can only contain numeric values.',
            'logo' => 'Logo is required!',
            "contactPerson.required" => "Contact person is required!",
//            "contactPerson.alpha" => "contain alphanumeric characters and ‘_’, ’ ‘, ‘-‘, or ‘.’.!",
            "contactPerson.alpha" => "Contact person can only contain alpha characters.!",
            "contactPhone.required" => "Contact person phone number is required!",
            "contactPhone.numeric" => "Contact person phone can only contain numeric values.",
            "hour.required" => "Hours is required!",
            "categories" => "Categories is required!",
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