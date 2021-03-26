<?php

namespace App\Repositories\Recipes;

use App\Entities\Recipes\Category\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Recipes\RecipesCategory;
use App\Model\Stores\Stores;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Services\ServicesRepository;
use App\Repositories\Recipes\RecipeRepository;

use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class RecipeCategoryRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of AboutRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return RecipesCategory::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return RecipesCategory::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */

    public function all()
    {

        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return RecipesCategory::all()->sortBy('created_at');
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

                return RecipesCategory::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }

    public function store(array $data)
    {
        if (self::is_valid()) {

            $recipe_category_avatar = request()->file('avatar');
            if ($recipe_category_avatar) {
                $file_name = time() . '.' . $recipe_category_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/recipes/category/' . $file_name);
                Image::make($recipe_category_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }
            $recipe_category = RecipesCategory::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'avatar' => $file_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('recipe_category.show', [$recipe_category->id])
                ->with('success', 'You have successfully create a new recipe category' . $data['title']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        RecipesCategory::destroy($id);
    }

    public function update($id, array $data)
    {
        if (self::is_valid()) {
            if (isset($data['active'])) {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }

            if (array_key_exists('avatar', $data)) {
                $recipe_category_avatar = request()->file('avatar');

                $f_name = time() . '.' . $recipe_category_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/recipes/category/' . $f_name);
                Image::make($recipe_category_avatar)->resize(400, 400)->save($location);
                $data['avatar'] = $f_name;
            }

            'avatar' == $f_name;

            self::get($id)->update($data);
            return redirect('recipe-category/' . $id)->with('success', 'Product Category updated successfully');
        }

    }

    public function getActiveRecipeCategories()
    {
        $active_recipes = App::make(RecipeCategoryRepository::class)->all()
            ->where('active', '1')
            ->count();

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
   
   public function getRecipes()
    {
        return App::Make(RecipeRepository::class)->all()->pluck('title', 'id');
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function getStatistics()
    {
        return (object)
            [
            'active' => $this->getActiveTotal(self::all()),
            'unverified' => $this->getUnverifiedTotal(self::all()),
            'blocked' => $this->getBlockedTotal(self::all()),
            'total' => $this->getTotal(self::all()),
        ];
    }

    public function getFormValues()
    {
        return request()->all();
    }

    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getErrors()
    {
        return self::validation()->errors();
    }

    public function is_valid($edit = false)
    {
        if (self::validation()->fails()) {
            return false;
        }
        return true;
    }

}