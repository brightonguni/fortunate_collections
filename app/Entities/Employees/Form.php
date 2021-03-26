<?php
namespace App\Entities\Employees;

use App\Helpers\FormInterface;
use App\Model\Customers\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;

class Form implements FormInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validation($email_rules = 'required|email|unique:users')
    {

        $data = self::submission();
        $customer = Customer::find(Auth::user()->id);

        // if user is admin, do not require the licensor

        $admin = false;
        $mainrole_allowed = false;
        if ($customer->role()->name === 'Administrator') {
            $mainrole_allowed = true;
        }
        if ($customer->role()->name === 'Administrator' && $data['role_id'] == 1) {
            $admin = true;
        }

        $validator = tap(Validator::make($data, [
            "first_name" => "required|string|regex:/^[\pL\s\-]+$/u",
            "last_name" => "required|string|regex:/^[\pL\s\-]+$/u",
            "email" => $email_rules . '|max:255',
            "phone" => 'required|regex:/(0)[0-9]{9}/',
            "role_id" => ($mainrole_allowed) ? 'required|numeric' : 'required|numeric' . '|in:1,2,3,4',
            "licensor_id" => ($admin) ? '' : 'required|numeric',
            "store_id" => "required",
            "team_id" => "required",
            "skill_id" => "required",
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
