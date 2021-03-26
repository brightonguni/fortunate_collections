<?php

namespace App\Repositories\Products;

use App\Entities\Products\Color\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\Role;
use App\Model\Products\Color;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;
class ProductColorRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        return Color::all()->where('active', 1);
    }
    public function get($id)
    {
        return Color::findOrfail($id);
    }
    /**
     *
     *  get all web products
     *
     */
    public function getProductColors()
    {
        return Color::all()->sortBy('created_at');

    }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Color::all()->sortBy('created_at');
                break;
            case "2":
                return [];
                break;
            case "3":
                return [];
                break;
            case "4":
                $licens_id = User::findOrfail(Auth::user()->id)
                    ->LicensorUser()
                    ->licensor_id;
                $licensor_stores = Licensor::findOrfail($licens_id)
                    ->stores()
                    ->pluck('store_id');

                return Color::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }

    //  save data
    public function store(array $data)
    {
        if (self::is_valid()) {
            $avatar = request()->file('avatar');

            if ($avatar) {
                $file_name = time() . '.' . $avatar->getClientOriginalExtension();
                $location = public_path('assets/images/products/color/' . $file_name);
                Image::make($avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }

            $color = Color::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'avatar' => $file_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('product_color.show', [$color->id])
                ->with('success', 'You have successfully create a Product color' . $data['name']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());

    }
    //update project details

    public function update($id, array $data)
    {
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        if (array_key_exists('avatar', $data)) {
            $product_color_avatar = request()->file('avatar');

            $f_name = time() . '.' . $product_color_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/products/color/' . $f_name);
            Image::make($product_color_avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }

        'avatar' == $f_name;
        self::get($id)->update($data);
        return redirect('product-color/' . $id)->with('success', 'Product Color updated successfully');

    }

    public function getActiveProductColors()
    {
        $active_category = App::make(ProductColorRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor projects

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getErrors()
    {
        return self::validation()->errors();
    }
    public function getStatistics()
    {
        //die($this->getActiveTotal(self::all()));
        return (object)
            [
            'active' => $this->getActiveTotal(self::all()),
            'unverified' => $this->getUnverifiedTotal(self::all()),
            'blocked' => $this->getBlockedTotal(self::all()),
            'total' => $this->getTotal(self::all()),
        ];
    }
    public function getRoles()
    {
        return Role::all();
    }
    public function productByColor($id)
    {
        return Product::where('color_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
    }
    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function is_valid()
    {
        if (self::validation()->fails()) {
            return false;
        }
        return true;
    }

    public function userIsLicensor()
    {
        $loggedin_user_role = User::findOrFail(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }
    public function productBelongsToLicensor($project)
    {
        $loggedin_licensor_id = User::find(Auth::user()->id)->licensorUser()->licensor_id;
        if (!$product->store()) {
            // return 'no';
        }
        $store_id = $project->store()->first()->id;
        return (LicensorStore::where(['store_id' => $store_id, 'licensor_id' => $loggedin_licensor_id])->first()) ? true : false;
    }
    public function unpublish($id)
    {
        self::update($id, array('active' => 0));
    }
    public function getFormValues()
    {
        return request()->all();
    }
    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        Color::destroy($id);
    }
}