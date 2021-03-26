<?php

namespace App\Repositories\Recipes;

use App\Entities\Recipes\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Recipes\Recipe;
use App\Model\Recipes\RecipesCategory;
use App\Model\Stores\Stores;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class RecipeRepository extends Form implements RepositoryInterface
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
        return Recipe::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Recipe::findOrfail($id);
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
                return Recipe::all()->sortBy('created_at');
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

                return Recipe::whereIn('store_id',
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

            $recipe_avatar = request()->file('avatar');
            if ($recipe_avatar) {
                $file_name = time() . '.' . $recipe_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/recipes/' . $file_name);
                Image::make($recipe_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }
            $recipe = Recipe::create([
                'title' => $data['title'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'category_id' => $data['category_id'],
                'avatar' => $file_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('recipe.show', [$recipe->id])
                ->with('success', 'You have successfully create a new recipe Page' . $data['title']);
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
        Recipe::destroy($id);
    }

    public function update($id, array $data)
    {
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        if ($recipe_avatar) {
            $file_name = time() . '.' . $recipe_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/recipes/' . $file_name);
            Image::make($recipe_avatar)->resize(300, 300)->save($location);
            $data['avatar'] = $file_name;
        }

        if ($this->recipe->is_valid()) {
            self::get($id)->update($data);
            return redirect()->back()->with('success', 'recipe Updated Successfuly');
        }
        return redirect()->back()->withErrors($this->recipe->getErrors());
    }

    public function getActiveRecipes()
    {
        $active_recipes = App::make(RecipeRepository::class)->all()
            ->where('active', '1')
            ->count();

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    
    public function getRecipeCategories()
    {
        return RecipesCategory::where('active', 1)->get();
    }

    public function getRecipesCategory()
    {
        return App::Make(RecipeCategoryRepository::class)->all()->pluck('title', 'id');
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