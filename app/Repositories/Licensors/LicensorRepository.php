<?php

    namespace App\Repositories\Licensors;

    use App\Repositories\Devices\DeviceRepository;
    use App\Entities\Licensors\Form;
    use App\Helpers\RepositoryInterface;
    use App\Helpers\Statistics;
    use App\Helpers\Upload;
    use App\Model\Licensors\Licensor;
    use Illuminate\Support\Facades\App;
    use Validator;
    Use Auth;
    use App\Licensor\Model\LicensorUsers;

class LicensorRepository extends Form implements RepositoryInterface{
        use Statistics, Upload;
        /**
         * Get's a post by it's ID
         *
         * @param int
         * @return collection
         */
        public function get($id)
        {
            return Licensor::where('id',$id)->with(['stores','urls','customers','devices','orders'])->first();
        }

        public function getStatistics(){
            return (object) [
                'active'    => $this->getActiveTotal(self::all()),
                'device'    => App::make(DeviceRepository::class)->all()->count(),
                'blocked'   => $this->getBlockedTotal(self::all()),
            ];
        }

        /**
         * Get's all posts.
         *
         * @return mixed
         */
        public function all()
        {
            return Licensor::all()->sortByDesc('created_at');
        }

        /**
         * Deletes a post.
         *
         * @param int
         */
        public function delete($id)
        {
            //Category::destroy($id);
        }


        /**
         * Updates a post.
         *
         * @param int
         * @param array
         * @return mixed
         */
        public function update($id, array $data)
        {

            if(isset($data['active'])) {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }

            // delete previous
            $licensor = Licensor::where('id', $id)->first();
            $licensor->urls()->delete();

            if(isset($data['link_active']) && $data['licensor_url_name']) {
                foreach($data['licensor_url_name'] as $b => $l) {
                    \App\Licensor\Model\LicensorUrl::create([
                        'licensor_id' =>  $licensor->id,
                        'name'      =>    $l,
                        'licensor_url'  =>  $data['licensor_url_link'][$b]
                    ]);
                }
            }

            unset($data['link_active']);

            $licensor_logo = request()->file('licensor_logo');

            if( $licensor_logo ) {
                $licensor_folder = $this->storage_path('logo', $data['name']);
                $f_name = $licensor_logo->getClientOriginalName();
                $data['logo'] = $licensor_folder . '/' . $f_name;
                $licensor_logo->move( storage_path( '/app/public/logo/' . $licensor_folder ), $f_name);
            }

            // TODO: remove old image ?

            $licensor_splash_screen = request()->file('licensor_splash_screen');

            if( $licensor_splash_screen) {
                $licensor_folder = $this->storage_path('splash_screen', $data['name']);
                $f_name = $licensor_splash_screen->getClientOriginalName();
                $data['splash_screen'] = $licensor_folder . '/' . $f_name;
                $licensor_splash_screen->move( storage_path( '/app/public/splash_screen/' . $licensor_folder ), $f_name);
            }

            self::get($id)->update($data);
        }


        public function store( array $data){
            if(isset($data['active'])) {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }

            $licensor_logo = request()->file('licensor_logo');

            if( $licensor_logo ) {
                $licensor_folder = $this->storage_path('logo', $data['name']);
                $f_name = $licensor_logo->getClientOriginalName();
                $data['logo'] = $licensor_folder . '/' . $f_name;
                $licensor_logo->move( storage_path( '/app/public/logo/' . $licensor_folder ), $f_name);
            }

            $licensor_splash_screen = request()->file('licensor_splash_screen');

            if( $licensor_splash_screen) {
                $licensor_folder = $this->storage_path('splash_screen', $data['name']);
                $f_name = $licensor_splash_screen->getClientOriginalName();
                $data['splash_screen'] = $licensor_folder . '/' . $f_name;
                $licensor_splash_screen->move(storage_path('/app/public/splash_screen/' . $licensor_folder), $f_name, 0755, true);
            }

            $licensor = Licensor::create($data);

            if(isset($data['link_active']) && $data['licensor_url_name']) {
                foreach($data['licensor_url_name'] as $b => $l) {
                    \App\Licensor\Model\LicensorUrl::create([
                        'licensor_id' =>  $licensor->id,
                        'name'      =>    $l,
                        'licensor_url'  =>  $data['licensor_url_link'][$b]
                    ]);
                }
            }

            unset($data['link_active']);
            return $licensor;

        }

        public function unpublish($id) {
            self::update($id, ['active' => 0]);
        }

        public function validateRequest($edit = false)
        {

            $links = [];
            $er    = [];

            if(request()->get('link_active') && request()->get('licensor_url_name')) {

                foreach (request()->get('licensor_url_name') as $k => $v) {
                    $links['licensor_url_name.' . $k] = 'sometimes|required|max:255';
                    $er['licensor_url_name.' . $k . '.required'] = 'The licensor url name is required';
                    $er['licensor_url_name.' . $k . '.max'] = 'The licensor url name needs to be less than 255 chars';
                }

                foreach (request()->get('licensor_url_link') as $k => $v) {
                    $links['licensor_url_link.' . $k] = 'sometimes|required|max:255';
                    $er['licensor_url_link.' . $k . '.required'] = 'The licensor url link is required';
                    $er['licensor_url_link.' . $k . '.max'] = 'The licensor url link needs to be less than 255 chars';
                }
            }

            $splash = ($edit) ? 'sometimes|' : '';
            $lo     = ($edit) ? 'sometimes|' : '';

            $validator = Validator::make(request()->all(), array_merge([
                'name'              => 'required|max:255',
                'color'             => 'required|max:255',
                'secondary_color'   => 'required|max:255',
                'additional_color'  =>  'required|max:255',
                'licensor_splash_screen'     => $splash . 'required|image|file|mimes:jpeg,bmp,png|max:2048',
                'licensor_logo'       => $lo . 'required|image|file|mimes:jpeg,bmp,png|max:2048',
            ], $links), $er );

            return $validator;

        }

        public function getErrors($edit = false)
        {
            return self::validateRequest($edit)->errors();
        }

        public function getFormValues(){
            return request()->all();
        }


        public function is_valid($edit = false){
            if (self::validateRequest($edit)->fails()) {
                return false;
            }
            return true;
        }

        public function getByUserID(){
            $user = Auth::user();

            if(!$user){
                return ;
            }

            return LicensorUsers::where('user_id',$user->id)->first();
                    }


        public function getStores($id){
            return Licensor::where('id',$id)->with(['stores'])->first();
        }

    }
