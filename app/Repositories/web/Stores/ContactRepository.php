<?php

namespace App\Repositories\web\Stores;

use App\Entities\Stores\Contacts\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Stores\Contact;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Services\ServicesRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ContactRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of DepartmentsRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return Contact::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Contact::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */

    public function all()
    {

        return Contact::all()->sortBy('created_at');

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
    public function getActiveContacts()
    {
        $active_contacts = App::make(ContactRepository::class)->all()
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