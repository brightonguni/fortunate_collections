<?php

namespace App\Repositories\web\Blogs;

use App\Entities\Blog\Comments\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Blogs\BlogCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BlogCategoryRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of BlogCategoryRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return BlogCategory::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return BlogCategory::findOrfail($id);
    }

    /**
     * Get's all Comments.
     *
     * @return mixed
     */
    public function allCategories()
    {
        return BlogCategory::all()->sortByDesc('created_at');
    }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return BlogCategory::all()->sortBy('created_at');
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

                return BlogCategory::whereIn('store_id',
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

            // create a team
            $cotegory = BlogCategory::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'avatar' => $data['avatar'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('blog_category.show', [$category->id])
                ->with('success', 'You have successfully create category' . $data['title']);
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
        BlogCategory::destroy($id);
    }

    //update comment details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }

    public function getBlogByCategoryId($id)
    {
        $blogByCategoryId = App::make(BlogRepository::class)->all()
            ->where('category_id', $id)->get();
    }
    public function getActiveCategorries()
    {
        $active_categories = App::make(BlogCategoryRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor comments

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
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