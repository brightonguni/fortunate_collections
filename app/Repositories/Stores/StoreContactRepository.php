<?php

namespace App\Repositories\Stores;

use App\Entities\Stores\Contacts\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Stores\Contact;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class StoreContactRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of contactsRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {

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
    // public function all()
    // {
    //     return Contact::all()->sortByDesc('created_at');
    // }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Contact::all()->sortBy('created_at');
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

                return Contact::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }
    public function show($id)
    {
        return Contact::where('id', $id)->first();

    }
    public function store(array $data)
    {
        if (self::is_valid()) {

            $contact = Contact::create([

                'user_id' => $data['user_id'],
                'store_id' => $data['store_id'],
                'licensor_id' => $data['licensor_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('store_contact.show', [$contact->id])
                ->with('success', 'You have successfully create contacts' . $data['user_id']);
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
        contact::destroy($id);
    }

    //update team details

    public function update($id, array $data)
    {
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        self::get($id)->update($data);
        return redirect('store-contact/' . $id)->with('success', 'store Contact updated successfully');

    }
    public function getActiveContacts()
    {
        $active_contacts = App::make(StoreContactsRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor contacts

        return (object) ['active' => $this->getActiveTotal(self::all())];
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
    public function getUsers()
    {
        return User::all()->pluck('name', 'id');
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