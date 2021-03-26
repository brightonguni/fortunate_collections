<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Model\Drivers;
use App\User;
use App\Model\Permissions\RoleUser;
use App\Permissions\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mandrill;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);
    }



     protected function validator_reg(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',


        ]);
    }



    public function sign_up(){
        return view('auth.register');

    }

 

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {   
        // print_r($data);
        // die();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cell' => $data['cell'],
            'position' => $data['position'],
            'company' => $data['company'],
            'password' => bcrypt($data['password']),
        ]);

        // assign user role
        $user->assignRole('User');

        //return $user;
    }
    public function register(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data);
        if($validator->fails()){
           return \Redirect::back()->withErrors($validator)->withInput();
       }else{

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);

        $name = $data['name'];
        $email = $data['email'];
            // $admin_name = "Admin";
            // $admin_email = "t";

            //sends out a email confirming sign up was successful.
        //$this->send_confirmation_signup_email($user->name, $user->email);        
        //$this->alert_admin_new_user_signup($user->name, $user->email, $user->cell, $user->position, $user->id);

          
         $user->assignRole('User');
        flash('You have been successfully registered.');
        \Auth::loginUsingId($user->id);
        $role = Role::where('name', 'User')->first();
        $roleAssign = UserRoles::create([
            'user_id' => $user->id,
            'role_id' => $role->id,

        ]);
        // \Auth::loginUsingId($user->id);

            // $data = array('name'=>"Africarena Team");

        return redirect('/home');
    }             
}

    
    
    public function register_i(){
        return redirect()->route('coming_soon');
          return view('/auth.investor_register');
    }
   public function register_investor(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator_reg($data);
        if($validator->fails()){
           return \Redirect::back()->withErrors($validator)->withInput();
       }else{

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'company' => "",
            'password' => bcrypt($data['password']),

        ]);

        $name = $data['name'];
        $email = $data['email'];
        
        //$this->send_confirmation_signup_email_investor($user->name, $user->email);        
        
        // assign user role
        $user->assignRole('Investor');
        flash('You have been successfully registered.');
        \Auth::loginUsingId($user->id);
        $role = Role::where('name', 'Investor')->first();
        $user = UserRoles::create([
            'user_id' => $user->id,
            'role_id' => $role->id,

        ]);
        
        return redirect('/investor_dashboard');
    }             
}



public function send_confirmation_signup_email($name, $email) {
        try {
            $mandrill = new Mandrill(Config::get('services.mandrill.secret'));
            $template_name = 'user-sign-up-investors-confirmation';
            $template_content = array(
                array(
                    'name' => 'FNAME',
                    'content' => $name
                )
            );
            $message = array(
                'subject' => 'cash on delivery - Welcome to the platform.',
                'from_email' => 'contact@guniitsolutions.co.za',
                'from_name' => 'Cash on delivery Team',
                'to' => array(
                    array(
                        'email' => $email,
                        'name' => $name,
                        'type' => 'to'
                    )
                ),
                'headers' => array('Reply-To' => 'contact@guniitsolutionsco.za'),
            );

            $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

            } catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
            throw $e;
            }        
    }



    public function send_confirmation_signup_email_driver($name, $email) {
        try {
            $mandrill = new Mandrill(Config::get('services.mandrill.secret'));
            $template_name = 'cash-on-delivery-sign-up-confirmation';
            $template_content = array(
                array(
                    'name' => 'FNAME',
                    'content' => $name
                )
            );
            $message = array(
                'subject' => 'Cash on delivery - 2019 - Welcome to the platform.',
                'from_email' => 'contact@guniitsolutions.co.za',
                'from_name' => 'The Cash on delivery Team',
                'to' => array(
                    array(
                        'email' => $email,
                        'name' => $name,
                        'type' => 'to'
                    )
                ),
                'headers' => array('Reply-To' => 'contact@guniitsolutions.co.za'),
            );

            $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

            } catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
            throw $e;
            }        
    }




    public function alert_admin_new_user_signup($name, $email, $phonenumber, $position, $user_id) {
    try {
        $mandrill = new Mandrill(Config::get('services.mandrill.secret'));

        $template_name = 'aa18-portal-new-user-registered';
        $template_content = array(
            array(
                'name' => 'name',
                'content' => $name
            ),
            array(
                'name' => 'email',
                'content' => $email
            ),
            array(
                'name' => 'phonenumber',
                'content' => $phonenumber
            ),
            array(
                'name' => 'position',
                'content' => $position
            ),
            array(
                'name' => 'user_id',
                'content' => $user_id
            )
        );
        $message = array(
            'subject' => 'Cash on delivery 2019 - New user registered',
            'from_email' => 'contact@guniitsolutions.co.za',
            'from_name' => 'The Guni It solutions Team',
            'to' => array(
                array(
                    'email' => 'contact@guniitsolutions.co.za',
                    'name' => 'The cash on Delivery Team',
                    'type' => 'to'
                )
            ),
            'headers' => array('Reply-To' => 'contact@guniitsolutions.co.za'),
            'merge' => true,
            'merge_language' => 'mailchimp',
            'global_merge_vars' => array(
                array(
                    'name' => 'name',
                    'content' => $name
                ),
                array(
                    'name' => 'email',
                    'content' => $email
                ),
                array(
                    'name' => 'phonenumber',
                    'content' => $phonenumber
                ),
                array(
                    'name' => 'position',
                    'content' => $position
                ),
                array(
                    'name' => 'user_id',
                    'content' => $user_id
                )
            )
        );

        $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

    } catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
        echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
        throw $e;
    }        
}




}
