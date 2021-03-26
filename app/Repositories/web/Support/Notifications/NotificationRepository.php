<?php

    namespace Support\Notifications;

    use App\Helpers\RepositoryInterface;
    use Validator;
    use App\Helpers\Notify;
    use App\Support\Model\Notifications;

    class NotificationRepository implements RepositoryInterface{

        use Notify;

        /**
         * Get's a notification by it's ID
         *
         * @param int
         * @return object
         */
        public function get($id)
        {
            return Notifications::find($id);
        }

        /**
         * Get's all notifications.
         *
         * @return mixed
         */
        public function all()
        {
            return Notifications::all()->sortByDesc('created_at');
        }

        /**
         * Get's a notification by it's type
         *
         * @param string
         * @return object
         */
        public function findByType($type)
        {
            return Notifications::where('type', $type)->first();
        }

        /**
         * Deletes a notification.
         *
         * @param int
         */
        public function delete($id)
        {
            //
        }

        /**
         * Updates a notifications.
         *
         * @param int
         * @param array
         */
        public function update($id, array $data)
        {
            if(isset($data['active'])) {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }

            $notification = self::get($id);
            $variables    = json_decode( $notification->variables );

            $variables->message = $data['message'];

            $data['variables'] = json_encode($variables);

            self::get($id)->update($data);

        }

        public function store( array $data){
            if(isset($data['active'])) {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }

            $variables = json_encode( ['type' => $data['type'] , 'message' => $data['message']] );
            $data['variables'] = $variables;
            $data['severity']  = '3';
            Notifications::create($data);

        }

        public function validateRequest($edit = true){
            $validator = Validator::make(request()->all(),[
                'message'   => 'required|string',
                'active'    => '',
                'type'      => 'sometimes|required'
            ]);
            return $validator;
        }

        public function is_valid($edit = true){
            if (self::validateRequest($edit)->fails()) {
                return false;
            }
            return true;
        }

        public function getErrors($edit = true){
            return self::validateRequest($edit)->errors();
        }

        public function getFormValues(){
            return request()->all();
        }

    }
