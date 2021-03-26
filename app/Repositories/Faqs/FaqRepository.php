<?php

namespace App\Repositories\Faqs;

use App\Entities\Faqs\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\FAQ\FaqCategory;
use App\Model\FAQ\Faqs;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FaqRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of faqsRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return Faqs::all()->sortByDesc('created_at');

    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Faqs::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    // public function all()
    // {
    //     return Faqs::all()->sortByDesc('created_at');
    // }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Faqs::all()->sortBy('created_at');
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

                return Faq::whereIn('store_id',
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

            $faq = Faqs::create([
                'question' => $data['question'],
                'answer' => $data['answer'],
                'category_id' => $data['category_id'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('faq.show', [$faq->id])
                ->with('success', 'You have successfully create FAQ' . $data['question']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }
    public function getCategories()
    {
        return FaqCategory::all();
    }
    /**
     * Deletes a faq.
     *
     * @param int
     */
    public function delete($id)
    {
        FAQ::destroy($id);
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
        return redirect('faq/' . $id)->with('success', 'FAQ updated successfully');

    }
    public function getActiveFAQs()
    {
        $activeFAQs = App::make(FaqRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor faqs

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function AddFaqCategories()
    {
        return FaqCategory::all()->pluck('title', 'id');
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