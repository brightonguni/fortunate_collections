<?php
namespace App\Repositories\Customers;

use App\Entities\Customers\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Customers\Customer;
use App\Model\Customers\StoreUser;
use App\Model\Licensors\Licensor;
use App\Model\Licensors\LicensorUser;
use App\Model\Permissions\Role;
use App\Model\Stores\Store;
use App\Model\Stores\Stores;
//use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Validator;
use Image;

/**
 * Description of CustomerRepository
 *
 *
 * @author brightonguni
 */
class CustomerRepository extends Form implements RepositoryInterface
{

    use Statistics;

    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Customer::find($id);
    }
    public function getStores()
    {
        $stores = Stores::has('licensor')->get();
        // echo "<pre>";
        $data = [];
        foreach ($stores as $store) {
            // print_r($store->licensor->licensor);
            $data[] = (object) [
                'id' => $store->id,
                'name' => $store->name,
                'licensor' => $store->licensor->licensor,
            ];
        }
        return $data;
        // echo "</pre>";
        // die();
    }
    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        //$role = Customer::find(Auth->user()->id)->role()->id;
        $role = Auth::user()->role->id;

        //print_r($role);
        // show customers based on logged in user
        if ($role == 1) {
            return Customer::all()->sortBy('id');
        } elseif ($role == 3) {
            //DO: store owner
        } elseif ($role == 4) {
            $licensor_id = Customer::find(Auth::user()->id)->licensorUser()->licensor_id;
            return Licensor::find($licensor_id)->customers()->get()->sortBy('id');
        }
        return [];
    }
    public function trash()
    {
        $role = Customer::find(Auth::user()->id)->role()->id;
        if ($role == 1) {
            return Customer::onlyTrashed()->get()->sortByDesc('created_at');
        } elseif ($role == 3) {

        } elseif ($role == 4) {
            $licensor_id = Customer::find(Auth::user()->id)->licensorUser()->licensor_id;
            return Licensor::find($licensor_id)->customers()->onlyTrashed()->get();
        }
        return [];
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        Customer::destroy($id);
    }
    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        $validation = self::validateCustomer($data);
        // $Customer::where('id', $id)->first();
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput(self::submission());
        }
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        if (!isset($data['active'])) {
            $data['active'] = 0;
        }
        $avatar = request()->file('avatar');
        if ($avatar) {
            $file_name = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('assets/images/users/' . $file_name);
            Image::make($avatar)->resize(300, 300)->save($location);
            $data['avatar'] = $file_name;
        }

        $customer = Customer::where('id', $id)->first();
        $customer->name = $data['name'];
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->role_id = $data['role_id'];
        $customer->email = $data['email'];

        // $customer->cellphone = $data['cellphone'];
        $customer->active = $data['active'];
        $customer->phone = $data['phone'];
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
            $customer->password = $data['password'];
        }
        $customer->save();
        $userstores = StoreUser::where('user_id', $customer->id)->first();
        if (self::is_bussines($data)) {
            if ($userstores) {
                $userstores->store_id = $data['store'];
                $userstores->save();
            } else {
                StoreUser::create([
                    'user_id' => $customer->id,
                    'store_id' => $data['store'],
                ]);
            }
        } else {
            if ($userstores) {
                $userstores->delete();
            }
        }
        if (isset($data['licensor_id'])) {
            LicensorUsers::where('user_id', $id)->update(['licensor_id' => $data['licensor_id']]);

            //  }
            # create licensor user

        }
        return redirect('users/' . $id)->with('success', 'You have successfully updated the following user: ' . $data['name']);
    }
    private function validateCustomer($data)
    {
        $rules = [
            "first_name" => "required",
            "last_name" => "required",
            "licensor_id" => 'required',
            'role_id' => 'required',
            "email" => 'required|email|max:255',
            "phone" => 'required|regex:/(0)[0-9]{9}/',
            'active' => 'required',
        ];

        if (request()->has('role_id')) {

            if (self::is_bussines($data)) {

                $rules['store'] = 'required|numeric';
            }
        }
        $validator = tap(Validator::make($data, $rules), function () {

            if (request()->has('active')) {
                Validator::make(request()->all(), [
                    'active' => 'active|numeric',
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

    private function is_bussines($data)
    {
        $roles = Role::where('id', $data['role_id'])->first();
        if ($roles) {
            if ($roles->name == 'Business') {
                return true;
            }
        }
        return false;
    }

    public function store(array $user)
    {
        if (self::is_valid()) {
            # create new store
            $user['name'] = $user['first_name'] . ' ' . $user['last_name'];
            $user['password'] = Hash::make($user['password']);
            $new_user = Customer::create($user);

            if ($user['licensor_id']) {
                LicensorUser::create([
                    'licensor_id' => $user['licensor_id'],
                    'user_id' => $new_user->id,

                ]);
            }
            # create licensor user
            return redirect('users/' . $new_user->id)->with('success', 'You have successfully created the following user: ' . $user['name']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }

    public function register(array $user)
    {
        if (self::is_valid()) {
            # create new store
            $user['name'] = $user['first_name'] . ' ' . $user['last_name'];
            $user['password'] = Hash::make($user['password']);
            $new_user = Customer::create($user);
            LicensorUser::create([
                'licensor_id' => $user['licensor_id'],
                'user_id' => $new_user->id,
            ]);
            # create licensor user
            return ['status' => 'TOKEN', 'data' => Uuid::uuid4()->getClockSeqHiAndReservedHex(), 'code' => 200];
        }
        return response()->json(['status' => false, 'errors' => request()->header()], 401);
    }
    /**
     * Show all the customers dashboard.
     *
     */
    public function login()
    {
        # attempt login
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
//            return $this->handshake('password',[
            //                'email' => request('email'),
            //                'password' => request('password')
            //            ]);
            # generate access token

            #retrieve existing access token
            # validate whether access token has expired.
            #

            # Attempt to create an access token using user credentials
            $token = Auth::user()->createToken('Personal Access Token:' . Auth::user()->name);
            if (request()->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }

            $data = [
                'token' => $token->accessToken,
                'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString(),
                'message' => 'You have successfully logged in.',
            ];
            return response()->json(['status' => true, 'data' => $data], 200);

        } else {
            $data = [
                'code' => '404',
                'message' => "That account doesn't exist. Enter a different account or get a new one.",

            ];
            return response()->json(['status' => false, 'errors' => $data], $data['code']);
        }
    }

    public function getActiveCustomers()
    {
        $activeCustomers = App::make(customerRepository::class)->all()
            ->where('active', '1')
            ->count();

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getStatistics()
    {
        return (object) [
            'active' => $this->getActiveTotal(self::all()),
            'unverified' => $this->getUnverifiedTotal(self::all()),
            'blocked' => $this->getBlockedTotal(self::all()),
            'deleted' => $this->getTrashTotal(self::trash()),
        ];
    }

    // probably should be a helper / middleware
    public function userBelongsToLicensor($customer_id)
    {
        $licensorUser = Customer::find(Auth::user()->id)->licensorUser();
        return (LicensorUsers::where(['user_id' => $customer_id, 'licensor_id' => $licensorUser->licensor_id])->first()) ? true : false;
    }
    public function userIsLicensor()
    {
        $customer = Customer::find(Auth::user()->id);
        return ($customer->role()->name === 'Licensor') ? true : false;
    }
    public function apiUserNotAdmin()
    {
        $customer = Customer::find(auth()->guard('api')->user()->id);
        return $customer->role()->name !== 'Administrator';
    }
    public function userIsNotAdmin()
    {
        $customer = Customer::find(Auth::user()->id);
        return $customer->role()->name !== 'Administrator';
    }
    public function getRoles()
    {
        return Role::all();
    }
}