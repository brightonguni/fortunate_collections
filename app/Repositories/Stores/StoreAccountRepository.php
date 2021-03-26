<?php

namespace App\Repositories\Stores;

use App\Entities\Stores\Accounts\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Stores\Account;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreBankRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class StoreAccountRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of accountsRepository
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
        return Account::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    // public function all()
    // {
    //     return Account::all()->sortByDesc('created_at');
    // }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Account::all()->sortBy('created_at');
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

                return Account::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }
    public function show($id)
    {
        return Account::where('id', $id)->first();

    }
    public function store(array $data)
    {
        if (self::is_valid()) {

            $account = Account::create([
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'account_type' => $data['account_type'],
                'bank_id' => $data['bank_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('store_account.show', [$account->id])
                ->with('success', 'You have successfully create accounts : ' . $data['account_name']);
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
        account::destroy($id);
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
        return redirect('store-account/' . $id)->with('success', 'store updated successfully');

    }
    public function getActiveAccounts()
    {
        $active_accounts = App::make(accountsRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor accounts

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function getBanks()
    {
        return App::Make(StoreBankRepository::class)->all()->pluck('name', 'id');
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