<?php

namespace App\Repositories\web\Recipes;

use App\Entities\Teams\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Recipes\Recipe;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
       // return Recipe::all()->paginate(10);;
         return Recipe::orderBy('created_at', 'desc')->paginate(4);

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
        return Recipe::all()->sortBy('created_at');

        // $role = Auth::user()->role->id;

        // switch ($role) {
        //     case "1":
        //         return Recipe::all()->sortBy('created_at');
        //         break;
        //     case "2":
        //         return [];
        //         break;
        //     case "3":
        //         return [];
        //         break;
        //     case "4":
        //         $licens_id = User::findOrfail(Auth::user()->id)
        //             ->LicensorUser()
        //             ->licensor_id;
        //         $licensor_stores = Licensor::findOrfail($licens_id)
        //             ->stores()
        //             ->pluck('store_id');

        //         return Recipe::whereIn('store_id',
        //             $licensor_stores)
        //             ->get()
        //             ->sortBy('created_at');
        //         break;
        // }

        // return [];
    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            $recipe = Recipe::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('web_receip.show', [$about->id])
                ->with('success', 'You have successfully create a new Recipe Page' . $data['title']);
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
        if ($this->recipe->is_valid()) {
            self::get($id)->update($data);
            return redirect()->back()->with('success', 'Recipe Updated Successfuly');
        }
        return redirect()->back()->withErrors($this->recipe->getErrors());
    }

    public function getActivedepartments()
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