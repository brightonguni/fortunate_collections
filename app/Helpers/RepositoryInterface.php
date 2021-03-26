<?php

namespace App\Helpers;

interface RepositoryInterface
{
    /**
     * Get's specific resource by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get's all created resources.
     *
     * @return mixed
     *
     */
    public function all();

    /**
     * Deletes a specific resource.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a specific resource.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);

    /**
     * store a newly created resource.
     *
     * @param array
     */
    public function store(array $data);

}
