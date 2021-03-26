<?php

namespace App\Repositories\Products;

use App\Entities\Products\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\Role;
use App\Model\Products\Brand;
use App\Model\Products\Color;
use App\Model\Products\Product;
use App\Model\Products\ProductsCategory;
use App\Model\Products\ProductSubCategory;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        return Product::where('active', 1)->orderBy('created_at', 'desc')->paginate(9);
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
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Product::all()->sortBy('created_at');
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

                return Projects::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }
    public function getLatestProducts()
    {
        return Product::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

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
    public function getAllBrands()
    {
        return Brand::all();
    }
    public function getAllColors()
    {
        return Color::all();
    }
    //  save data
    public function store(array $data)
    {
        if (self::is_valid()) {
            $product_avatar = request()->file('product_avatar');

            if ($product_avatar) {

                $f_name = time() . '.' . $product_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/products/' . $f_name);
                Image::make($product_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $f_name;
            }
            $avatar = request()->file('avatar');
            
            if (array_key_exists('main_avatar', $data)) {
                $main_avatar = request()->file('main_avatar');

                $main_file = time() . '.' . $main_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/products/' . $main_file);
                Image::make($main_avatar)->resize(400, 400)->save($location);
                $data['avatar'] = $f_name;
            }
            'main_avatar' == $main_file;

            if ($avatar) {

                $file_name = time() . '.' . $avatar->getClientOriginalExtension();
                $location = public_path('assets/images/products/' . $file_name);
                Image::make($avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }

            $product = Product::create([
                'name' => $data['name'],
                'sku' => $data['sku'],
                'description' => $data['description'],
                'unit_price' => $data['unit_price'],
                'credit_price' => $data['credit_price'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'color_id' => $data['color_id'],
                'brand_id' => $data['brand_id'],
                'quantity' => $data['quantity'],
                'size' => $data['size'],
                'stock' => $data['stock'],
                'avatar' => $file_name,
                'product_avatar' => $f_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            // categories

            if (array_key_exists('categories', $data)) {
                self::setProductCategories($product->id);
            }
            if (array_key_exists('sub_categories', $data)) {
                self::setProductSubCategories($product->id);
            }

            return redirect()->route('product.show', [$product->id])
                ->with('success', 'You have successfully create a product' . $data['name']);

        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());

    }
    public function setProductCategories($id)
    {
        self::get($id)->categories()->sync(self::submission('categories'));

    }
    public function setProductSubCategories($id)
    {
        self::get($id)->sub_categories()->sync(self::submission('sub_categories'));

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
            $avatar = request()->file('avatar');

            $f_name = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('assets/images/products/' . $f_name);
            Image::make($avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;

        if (array_key_exists('avatar', $data)) {
            $product_avatar = request()->file('avatar');

            $f_name = time() . '.' . $product_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/products/' . $f_name);
            Image::make($product_avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'product_avatar' == $f_name;

        if (array_key_exists('main_avatar', $data)) {
            $main_avatar = request()->file('main_avatar');

            $main_file = time() . '.' . $main_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/products/' . $main_file);
            Image::make($main_avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'main_avatar' == $main_file;

        self::get($id)->update($data);
        return redirect('product/' . $id)->with('success', 'Product updated successfully');

    }
    public function setProductAvatar($id)
    {
        $product_avatar = request()->file('product_avatar');
        $product = self::get($id);
        $f_name = time() . '.' . $product_avatar->getClientOriginalExtension();
        $product_avatar->move(base_path() . 'app/public/assets/images/products', $f_name);
        $data['product_avatar'] = $f_name;

    }
    public function setAvatar($id)
    {
        $avatar = request()->file('avatar');
        $product = self::get($id);
        $f_name = time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->move(base_path() . 'app/public/assets/images/products/', $f_name);
        $data['avatar'] = $f_name;

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
        return ProductCategory::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

    }
    public function getProductSubCategory()
    {
        return App::Make(ProductSubCategoryRepository::class)->all()->pluck('title', 'id');
    }
    public function getBrands()
    {
        return App::Make(ProductBrandRepository::class)->all()->pluck('name', 'id');
    }
    public function getColors()
    {
        return App::Make(ProductColorRepository::class)->all()->pluck('name', 'id');
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
    public function productBelongsToLicensor($product)
    {
        $loggedin_licensor_id = User::find(Auth::user()->id)->licensorUser()->licensor_id;
        if (!$product->store()) {
            // return 'no';
        }
        $store_id = $product->store()->first()->id;
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
    public function getErrors()
    {
        return self::validation()->errors();
    }
}