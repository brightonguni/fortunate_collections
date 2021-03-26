<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $request;

    public function __construct(CommentRepository $repository, Request $request)
    {
        $this->comment = $repository;
        $this->request = $request;
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->comment->all();
        $statistics = $this->comment->getStatistics();
        $canDo = $this->auth()->user()->role->canDoAll();

        return view('pages.blogs.comments.index', compact('canDoAll', 'comments', 'statistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment($id)
    {
        $canDo = $this->auth()->user()->role->canDoAll();
        $comment = $this->comment->get($id);
        $statistics = $this->comment->getStatistics();

        return view('pages.comments.comment', compact('canDo', 'comment', 'statistics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->comment->store($this->store->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $canDo = $this->auth()->user()->role->canDoAll();
        $comment = $this->comment->get($id);

        return view('pages.comments.show', compact('canDo', 'comment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = $this->comment->get($id);
        $canDo = $this->auth()->user()->role->canDoAll();

        return view('pages.comments.edit', compact('canDo', 'comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->comment->update($id, $this->update->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blog->delete($id);

    }
}