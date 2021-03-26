<?php

namespace App\Repositories\web\Blogs;

use App\Entities\Blog\Comments\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Blogs\Comment;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CommentsRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of commentsRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        $comments = $this->comment->all()->sortBy('created_at');
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */

    public function get($id)
    {
        return Comment::findOrfail($id);
    }

    /**
     * Get's all Comments.
     *
     * @return mixed
     */
    // public function all()
    // {
    //     return Comment::all()->sortByDesc('created_at');
    // }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Comment::all()->sortBy('created_at');
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

            // create a team
            $comment = Comment::create([
                'blog_id' => $data['blog_id'],
                'comment' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('blog_comment.show', [$comment->id])
                ->with('success', 'You have successfully create comment' . $data['comment']);
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
        Comment::destroy($id);
    }

    //update comment details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }
    public function getBlogComments($id)
    {
        return Comment::where('blog_id', $id)->get();
    }
    

    public function getActiveComments()
    {
        $active_comments = App::make(CommentsRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor comments

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