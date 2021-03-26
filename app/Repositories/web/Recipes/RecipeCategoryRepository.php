<?php

namespace App\Repositories\web\Recipes;

use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Recipes\Recipe;
use App\Model\Recipes\RecipesCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RecipeCategoryRepository implements RepositoryInterface
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
        return RecipesCategory::all()->sortBy('created_at');
    }

    public function store(array $data)
    {
        //
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        //
    }

    public function update($id, array $data)
    {
        //
    }
    public function recipeByCategory($id)
    {
        return Recipe::where([['category_id', $id],['active', 1]])->paginate(4);
    }
    public function getActiveRecipeCategories()
    {
        $active_recipes = App::make(RecipeRepository::class)->all()
            ->where('active', '1')
            ->count();

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getServices()
    {
        return App::Make(ServicesRepository::class)->all()->pluck('title', 'id');
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