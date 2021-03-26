<?php

namespace App\Support\Controllers\Web;

use App\Http\Controllers\Controller;
use Support\Notifications\NotificationRepository;

class NotificationsController extends Controller
{

    protected $notification;

    public function __construct(NotificationRepository $notification)
    {
        $this->notification = $notification;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {

//        event(new UserSignup() );
        //        event(new UserPurchaseAfter());
        //        event(new UserTopup() );

        $notifications = $this->notification->all();
        return view('pages.notifications.index', compact('notifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Respons
     */
    public function show($id)
    {
        $notification = $this->notification->get($id);
        return view('pages.notifications.show', ['notification' => $notification]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $notification = $this->notification->get($id);
        return view('pages.notifications.edit', ['notification' => $notification]);
    }

    public function store()
    {
        if ($this->notification->is_valid()) {
            $this->notification->store($this->notification->getFormValues());
            return redirect()->route('notifications.create')->with('success', 'Notification successfully created!');
        }

        return redirect()->back()->withErrors($this->notification->getErrors());
    }

    public function create()
    {
        return view('pages.notifications.create', []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if ($this->notification->is_valid()) {
            $this->notification->update($id, $this->notification->getFormValues());
            return redirect()->back()->with('success', 'Notification successfully updated');
        }

        return redirect()->back()->withErrors($this->notification->getErrors());
    }

}
