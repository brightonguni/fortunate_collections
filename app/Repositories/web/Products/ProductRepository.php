<?php

namespace App\Repositories\web\Products;

use App\Entities\Products\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Permissions\Role;
use App\Model\Products\Product;
use App\Model\Products\ProductCategory;
use App\Model\Products\ProductsCategory;
use App\Model\Products\ProductSubCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        // return Product::where('active', 1)->get()->random()
        //     ->paginate(12);
        //   ->inRandomOrder()->first()
        return Product::where('active', 1)->inRandomOrder()->paginate(12);
        // ->paginate(12);
    }
    public function getLatestProducts()
    {
        return Product::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

    }
    public function get($id)
    {
        return Product::findOrfail($id);
    }
    /**
     *
     *  get all projects
     *
     */

    public function all()
    {

    }
    //  save data
    public function store(array $data)
    {
        //

    }
    //update project details

    public function update($id, array $data)
    {
        //
    }

    public function getActiveProducts()
    {
        $active_products = App::make(ProductRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor projects

        return (object) ['active' => $this->getActiveTotal(self::all())];
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
    
    public function productByCategory($id)
    {
        return ProductCategory::inRandomOrder()->where('category_id', $id)->paginate(12);

    }
    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getAllCategories()
    {
        return ProductsCategory::all();
    }

    public function getAllSubCategories()
    {
        return ProductSubCategory::all();
    }
    public function getAllProductSubCategory()
    {
        return ProductSubCategory::all();
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function validateRequest()
    {
        $validator = tap(Validator::make(self::getFormValues(), [
            'name' => 'required|min:3|string',
            'description' => 'required|max:60|string',
            'store_id' => 'required|numeric',
            'team_id' => 'required|numeric',
            'licensor_id' => 'required|numeric',
        ]), function () {
            if (request()->has('status')) {
                Validator::make(request()->all(), [
                    'status' => 'required|numeric',
                ]);
            }
        });
        return $validator;
    }
    public function is_valid()
    {
        if (self::validationRequest()->fails()) {
            return false;
        }
        return true;
    }

    public function userIsLicensor()
    {
        $loggedin_user_role = User::findOrFail(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }
    public function projectBelongsToLicensor($project)
    {
        $loggedin_licensor_id = User::find(Auth::user()->id)->licensorUser()->licensor_id;
        if (!$project->store()) {
            // return 'no';
        }
        $store_id = $project->store()->first()->id;
        return (LicensorStore::where(['store_id' => $store_id, 'licensor_id' => $loggedin_licensor_id])->first()) ? true : false;
    }
    public function unpublish($id)
    {
        self::update($id, array('active' => 0));
    }
    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        Product::destroy($id);
    }
}