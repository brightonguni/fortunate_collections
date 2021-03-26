<?php

namespace App\Repositories\CaseStudies;

use App\Entities\Blog\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\CaseStudies\CaseStudy;
use App\Repositories\Blogs\CommentsRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;

use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CaseStudyRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of BlogRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return CaseStudy::all()->sortBy('created_at');
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return CaseStudy::findOrFail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return CaseStudy::all()->sortBy('created_at');
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

                break;
        }

        return [];
    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            // create a blog
            $case_study = CaseStudy::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'category_id' => $data['category_id'],
                'licensor_id' => $data['licensor_id']->default(1),
                'store_id' => $data['store_id']->default(1),
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('case_study.show', [$case_study->id])
                ->with('success', 'You have successfully created ' . $data['title']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());
    }

    /**
     * Deletes a blog.
     *
     * @param int
     */
    public function delete($id)
    {
        CaseStudy::destroy($id);
    }

    //update team details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }
    public function getActiveBlogs()
    {
        $active_case_studies = App::make(CaseStudyRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor blogs

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }
    public function getCategories()
    {
        return App::Make(CaseStudyCategoryRepository::class)->all()->pluck('title', 'id');

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
    public function getComments()
    {
        return App::Make(CommentsRepository::class)->all()->pluck('name', 'id');
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