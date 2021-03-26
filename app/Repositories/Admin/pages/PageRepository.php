<?php

namespace App\Repositories\Admin\Pages;

use App\Entities\Admin\Pages\Form;
use App\Helpers\RepositoryInterface;
use App\Repositories\Stores\StoreRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Helpers\Statistics;
use App\Model\Pages\Page;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PageRepository extends Form implements RepositoryInterface
{

    use Statistics;

/**
 * Description of BlogPageRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return Page::all()->where('active', 1);
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Page::findOrfail($id);
    }
    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Page::all()->sortBy('created_at');
                break;
            case "2":
                return [];
                break;
            case "3":
                return [];
                break;
            case "4":
                $licensor_id = User::findOrfail(Auth::user()->id)
                    ->LicensorUser()
                    ->licensor_id;
                $licensor_stores = Licensor::findOrfail($licens_id)
                    ->stores()
                    ->pluck('store_id');

                break;
        }

        return [];
    }
    public function getPage($id)
    {
        return Page::where('id', $id && 'active', 1);
    }
    /**
     * Get's all Comments.
     *
     * @return mixed
     */
    public function allPages()
    {
        return Page::all()->sortByDesc('created_at');
    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            $page = Page::create([
                'title' => $data['title'],
                'description' => $data['description'],
                // 'avatar' => $data['avatar'],
                'store_id' => $data['store_id'],
                'licensor_id' => $data['licensor_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('page.show', [$page->id])
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
        Page::destroy($id);
    }

    //update comment details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }

    public function getFormValues()
    {
        return request()->all();
    }

    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
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

    public function userIsLicensor()
    {
        $loggedin_user_role = User::findOrFail(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }

}