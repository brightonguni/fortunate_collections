<?php

namespace App\Repositories\web\Blogs;

use App\Entities\Blog\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Blogs\Blog;
use App\Model\Blogs\BlogCategory;
use App\Repositories\web\Blogs\BlogCategoryRepository;
use App\Repositories\web\Blogs\CommentsRepository;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BlogRepository extends Form implements RepositoryInterface
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
        return Blog::orderBy('created_at', 'desc')->paginate(6);

    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Blog::findOrFail($id);

    }

    /**
     * Get's all blogs.
     *
     * @return mixed
     */

    public function all()
    {
        return Blog::all()->sortByDesc('created_at');

    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            // create a blog

            $blog_image = request()->file('avatar');

            if ($blog_image) {
                $blog_folder = $this->storage_path('avatar', $data['name']);
                $f_name = $blog_image->getClientOriginalName();
                $data['avatar'] = $blog_folder . '/' . $f_name;
                $blog_image->move(storage_path('/app/public/logo/' . $blog_folder), $f_name);
            }

            $blog = Blog::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'category_id' => $data['category_id'],
                'department_id' => $data['department_id'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('blog.show', [$blog->id])
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
        Blog::destroy($id);
    }

    //update team details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }

    public function allCategories()
    {
        return BlogCategory::all()->sortByDesc('created_at');
    }

    public function blogByCategory($id)
    {
        return Blog::where('category_id', $id)->get();
    }

    public function showAllBlogByCategory($id)
    {
        return Blog::where('category_id', $id)->get();

    }

    public function getRelatedBlog()
    {
        return Blog::all()->where('category_id', 'category_id')->sortBy('created_at');
    }
    public function getActiveBlogs()
    {
        $active_blogs = App::Make(BlogsRepository::class)->all()
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
        return App::Make(BlogCategoryRepository::class)->all()->pluck('title', 'id');

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