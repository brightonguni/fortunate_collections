<?php

namespace App\Repositories\AboutUs;

use App\Entities\Teams\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\AboutUs\AboutUsPage;
use App\Model\Stores\Stores;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Services\ServicesRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AboutUsRepository extends Form implements RepositoryInterface
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
        return AboutUsPage::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return AboutUsPage::findOrfail($id);
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
                return AboutUsPage::all()->sortBy('created_at');
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

    public function store(array $data)
    {
        if (self::is_valid()) {
            // create about us page
            $about = AboutUsPage::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            //print_r($about);
            return redirect()
                ->route('about_us.show', [$about->id])
                ->with('success', 'You have successfully create AboutUs Page' . $data['title']);
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
        AboutUsPage::destroy($id);
    }

    //update Page details

    public function update($id, array $data)
    {
        if ($this->about->is_valid()) {
            self::get($id)->update($data);
            return redirect()->back()->with('success', 'About us Page Updated Successfuly');
        }
        return redirect()->back()->withErrors($this->about->getErrors());
    }

    public function getActivedepartments()
    {
        $active_departments = App::make(departmentsRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor departments

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