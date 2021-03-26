<?php

namespace App\Repositories\Faqs;

use App\Entities\Faqs\Category\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\FAQ\FaqCategory;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class FaqCategoryRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of FaqCategoryRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return FaqCategory::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return FaqCategory::findOrfail($id);
    }

    /**
     * Get's all Comments.
     *
     * @return mixed
     */
    public function allCategories()
    {
        return FaqCategory::all()->sortByDesc('created_at');
    }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return FaqCategory::all()->sortBy('created_at');
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

                return FaqCategory::whereIn('store_id',
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
            $faq_avatar = request()->file('avatar');
            if ($faq_avatar) {

                $f_name = time() . '.' . $faq_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/faqs/category/' . $f_name);
                Image::make($faq_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $f_name;
            }
            $category = FaqCategory::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'avatar' => $f_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()->route('faq_category.show', [$category->id])
                ->with('success', 'You have successfully create category' . $data['title']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        FaqCategory::destroy($id);
    }

    //update comment details

    public function update($id, array $data)
    {
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }
        if (array_key_exists('avatar', $data)) {
            $faq_avatar = request()->file('avatar');
            $f_name = time() . '.' . $faq_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/faq/category/' . $f_name);
            Image::make($faq_avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;
        self::get($id)->update($data);
        return redirect('faq-category/' . $id)->with('success', 'FAQ category updated successfully');

    }

    public function FaqByCategory($id)
    {
        return App::make(FaqRepository::class)->all()
            ->where('category_id', $id);
    }
    public function getActiveCategories()
    {
        $active_categories = App::make(FaqCategoryRepository::class)->all()
            ->where('active', '1')->count();

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