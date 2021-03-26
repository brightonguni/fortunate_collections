<?php

namespace App\Repositories\web\Blogs;

use App\Entities\Blog\Page\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Pages\BlogPage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BlogPageRepository extends Form implements RepositoryInterface
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
        return BlogPage::all()->where('active', 1);
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return BlogPage::findOrfail($id);
    }
    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return BlogPage::all()->sortBy('created_at');
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
    public function getBlogPage($id)
    {
        return BlogPage::where('id', $id && 'active', 1);
    }
    /**
     * Get's all Comments.
     *
     * @return mixed
     */
    public function allBlogPages()
    {
        return BlogPage::all()->sortByDesc('created_at');
    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            $page = BlogPage::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'avatar' => $data['avatar'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('blog_page.show', [$page->id])
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
        BlogPage::destroy($id);
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