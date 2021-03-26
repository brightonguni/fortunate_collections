<?php

namespace App\Repositories\web\ContactUs;

use App\Entities\Teams\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\ContactUs\ContactUs;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ContactUsRepository extends Form implements RepositoryInterface
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
        return ContactUs::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return ContactUs::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */

    public function all()
    {
        return ContactUs::all()->sortBy('created_at');
    }

    public function store(array $data)
    {
        if (self::is_valid()) {

            // create a team
            $contact = Contact::create([
                'email_address' => $data['email_address'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'whatsApp_telephone' => $data['whatsApp_telephone'],
                'phone_number' => $data['phone_number'],
                'subject' => $data['subject'],
                'message' => $data['message'],
                'service_id' => $data['service_id'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            \Mail::send('admin_email',
                array(
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'email_address' => $request->get('email_address'),
                    'whatsApp_telephone' => $request->get('whatsApp_telephone'),
                    'phone_number' => $request->get('phone_number'),
                    'service_id' => $request->get('service_id'),
                    'licensor_id' => $request->get('licensor_id'),
                    'store_id' => $request->get('store_id'),
                    'subject' => $request->get('subject'),
                    'phone_number' => $request->get('phone_number'),
                    'user_message' => $request->get('message'),
                ), function ($message) use ($request) {
                    $message->from($request->email);
                    $message->to('info@manuxkitchens.co.za');
                });

            return redirect()
                ->route('web_contact_us.index')
                ->with('success', 'Thank you for contacting us' . $data['email']);
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
        ContactUs::destroy($id);
    }

    //update team details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }
    public function getActiveContacts()
    {
        $active_contacts = App::make(ContactUsRepository::class)->all()
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