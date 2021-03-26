<?php

namespace App\Repositories\Blogs;

use App\Entities\Blog\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Blogs\Blog;
use App\Model\Blogs\BlogCategory;
use App\Model\Blogs\BlogDepartment;
use App\Model\Blogs\BlogsCategory;
use App\Model\Employees\Department;
use App\Repositories\Blogs\CommentsRepository;
use App\Repositories\Departments\DepartmentsRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

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
        // return Blog::all()->sortBy('created_at', 'desc')->paginate(6);
        return Blog::orderBy('created_at', 'desc')->paginate(10);

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
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Blog::all()->sortBy('created_at');
                break;
            case "2":
                return [];
                break;
            case "3":
                return [];
                break;
            case "4":
                $licens_id = User::findOrFail(Auth::user()->id)
                    ->LicensorUser()
                    ->licensor_id;
                $licensor_stores = Licensor::findOrfail($licens_id)
                    ->stores()
                    ->pluck('store_id');

                break;
        }

        return [];
    }

    public function show($id)
    {
        return Blog::where('id', $id)->first();

    }
    public function store(array $data)
    {
        if (self::is_valid()) {
            $blog_avatar = request()->file('avatar');
            if ($blog_avatar) {
                $f_name = time() . '.' . $blog_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/blogs/' . $f_name);
                Image::make($blog_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $f_name;
            }

            $blog = Blog::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'avatar' => $f_name,
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            # update the blog categories details
            if (array_key_exists('categories', $data)) {
                self::setCategories($blog->id);
            }

            # update the blogs details
            if (array_key_exists('departments', $data)) {
                self::setDepartments($blog->id);
            }

            return redirect()->route('blog.show', [$blog->id])
                ->with('success', 'You have successfully created ' . $data['title']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());
    }

    public function setLogo($id)
    {
        $blog_image = request()->file('avatar');
        $blog = self::get($id);
        $blog->avatar = $blog_image->getClientOriginalName();
        $file->storeAs('avatar', $blog_image->getClientOriginalName(), '/app/public/assets/blogs/');
        $blog->save();
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
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        if (array_key_exists('avatar', $data)) {
            $blog_avatar = request()->file('avatar');
            $f_name = time() . '.' . $blog_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/blogs/' . $f_name);
            Image::make($blog_avatar)->resize(500, 500)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;
        self::get($id)->update($data);
        return redirect('blog/' . $id)->with('success', 'Blog updated successfully');

    }
    public function getAllDepartments()
    {
        return Department::all();
    }
    public function allCategories()
    {
        return BlogCategory::all()->sortByDesc('created_at');
    }
    public function getDepartments()
    {
        return App::Make(DepartmentsRepository::class)->all()->pluck('name', 'id');
    }
    public function setCategories($id)
    {
        self::get($id)->categories()->sync(self::submission('categories'));
    }

    public function setDepartments($id)
    {
        self::get($id)->departments()->sync(self::submission('departments'));
    }

    public function getCategories()
    {
        return BlogCategory::all();
    }

    public function getRelated()
    {
        //
        return true;
    }

    public function blogByCategory($id)
    {
        return Blog::where('category_id', $id)->get();
    }
    public function getBlogByDepartmentId($id)
    {
        return BlogDepartment::where('blog_id', $id)->get();

    }

    public function getBlogByCategoriesId($id)
    {
        return BlogsCategory::where('blog_id', $id)->get();

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
        return (object) ['active' => $this->getActiveTotal(self::all())];
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