<?php
namespace App\Entities\Employees\Skill;

use App\Helpers\FormInterface;
use App\Model\Employees\Skill;
use Illuminate\Support\Facades\Auth;
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
            'name' => 'required',
            'description' => 'required|string',
            'level_id'=>'required',
            "licensor_id" => 'required|numeric',
            "store_id" => "required",
            'experience' => 'required',
           
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
            'email.required' => 'Work email is required!',
            'first_name.required' => 'First Name is required',
            'first_name.regex' => 'First Name can only contain alpha characters.!',
            'last_name.required' => 'First Name is required',
            'last_name.regex' => 'Last Name can only contain alpha characters.!',
            'phone.required' => 'Phone Number is required!',
            'phone.numeric' => 'Phone Number can only contain numeric values.',
            'licensor_id.required' => 'Licensor is required.',
            'role_id.required' => 'Role is required.',
            'skill_id.required' => 'skills are required, please capture your skills',
            'team_id.required' => 'an employee must a member of a team',
            'password.required' => 'Password is required.',
        ];
    }

    public function is_valid($email_rules = 'required|email|unique:users')
    {
        if (self::validation($email_rules)->fails()) {
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