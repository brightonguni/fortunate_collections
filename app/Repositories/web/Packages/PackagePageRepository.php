<?php

namespace App\Repositories\web\Packages;

use App\Entities\Packages\Page\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Pages\PackagePage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PackagePageRepository extends Form implements RepositoryInterface
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
        return PackagePage::all()->where('active', 1);
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return PackagePage::findOrfail($id);
    }
    public function all()
    {
        return PackagePage::all()->sortBy('created_at');
    }
    public function getFaqPage($id)
    {
        return PackagePage::where('id', $id && 'active', 1);
    }
    /**
     * Get's all Comments.
     *
     * @return mixed
     */
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

    //update comment details

    public function update($id, array $data)
    {
        //
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
