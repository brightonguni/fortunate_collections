<?php

namespace App\Repositories\web\Products;

use App\Entities\Products\Categories\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Permissions\Role;
use App\Model\Products\Product;
use App\Model\Products\ProductsCategory;
use App\Model\Products\ProductSubCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductSubCategoryRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        return ProductSubCategory::all()->where('active', 1);
    }
    public function get($id)
    {
        return ProductSubCategory::findOrfail($id);
    }
    /**
     *
     *  get all web products
     *
     */
    public function get_product_categories()
    {
        return ProductsCategory::all()->sortBy('created_at');

    }

    public function all()
    {
        return ProductSubCategory::all()->sortBy('created_at');

    }

    //  save data
    public function store(array $data)
    {
        //
    }
    //update project details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }

    public function getActiveProducts()
    {
        $active_category = App::make(ProductCategoryRepository::class)->all()
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
    public function productByCategories($id)
    {
        return ProductSubCategory::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

    }
    public function productByCategory($id)
    {
        return ProductSubCategory::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

    }
    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
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
    public function projectBelongsToLicensor($product)
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
    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        ProductSubCategory::destroy($id);
    }
}