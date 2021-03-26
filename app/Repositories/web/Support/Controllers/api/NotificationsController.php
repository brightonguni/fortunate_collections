<?php

    namespace App\Support\Controllers\Api;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Support\Notifications\NotificationRepository;

    class NotificationsController extends Controller
    {

        protected $notification;

        public function __construct(NotificationRepository $notification)
        {
            $this->notification = $notification;
        }

        /**
         * Display a listing of the resource.
         *
         * @return View
         */
        public function index()
        {
            //$notifications = $this->returnCollectionJson( $this->notification->all() );
            //return $notifications;
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return Response
         */
        public function show($id)
        {
            $notification = $this->notification->get($id );

            if(!isset($notification->type)) {
                return $this->error404();
            }

            return $this->returnJson( $notification );
        }

        public function showByType($type)
        {
            $notification = $this->notification->findByType($type);

            if(!isset($notification->type)) {
                return $this->error404();
            }

            $notification = $this->returnJson($notification );
            return $notification;
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  int  $id
         * @return Response
         */
        public function update($id)
        {
            //
        }

        public function returnCollectionJson($notifications)
        {
            $array = [];

            foreach($notifications as $notification)
            {
                $array[] = $this->returnJson($notification)['data'];
            }
            return array_merge(['status' => 200], ['message' => $array]);
        }

        public function returnJson($notification)
        {
            return ['status' => 200, 'data' => $notification->variables ];
        }

        public function error404()
        {
            return ['status' => 404, 'data' => 'Record not found'];
        }

    }
