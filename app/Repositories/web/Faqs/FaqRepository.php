<?php

namespace App\Repositories\web\Faqs;

use App\Entities\Faqs\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\FAQ\Faqs;
use App\Model\FAQ\FaqCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FaqRepository extends Form implements RepositoryInterface
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

     public function getCategories()
    {
        return FaqCategory::all();
    }
    public function all()
    {

        return Faqs::all()->sortBy('created_at');

    }

    public function store(array $data)
    {
        if (self::is_valid()) {

            // create a team
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
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());
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
      //
    }
    public function getActiveFAQs()
    {
        $activeFAQs = App::make(FaqRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor departments

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getLicensors()
    {
      //
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


}