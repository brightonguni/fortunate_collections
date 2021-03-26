<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

Trait Upload {

    public function storage_path($type, $licensor_name)
    {

        // construct path if not exists
        //storage/app/public/logo

        $licensor_name = trim($licensor_name);
        $licensor_name = strtolower($licensor_name);
        $licensor_name = str_replace(' ', '_', $licensor_name);

        if(!is_dir(storage_path('/app/public/' . $type .'/'.$licensor_name))) {
            mkdir(storage_path('/app/public/' . $type .'/'.$licensor_name), 0755, true);
        }

        return $licensor_name;

        // save file

    }

    public function upload_image($file)
    {

    }

}
