<?php

namespace App\Helpers;

interface FormInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validation();

    /**
     * Get the submission that apply to the request.
     * @param string
     * @return mixed
     *
     */
    public function submission($key = null);

    /**
     * Get the invalid inputs that apply to the request.
     */

    public function errors();

    /**
     * Save the submission that apply to the request.
     */
//    public function save();

}
