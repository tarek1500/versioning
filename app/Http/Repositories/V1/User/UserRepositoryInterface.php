<?php

namespace App\Http\Repositories\V1\User;

interface UserRepositoryInterface
{
    /**
     * Get all resources from storage.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Get paginated resources from storage.
     *
     * @param int $perPage Per page count.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage);

    /**
     * Get a resource from storage.
     *
     * @param int $id Resource id.
     * @param bool $fail Throw an error or not.
     *
     * @return \App\Models\User
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find($id, bool $fail = true);

    /**
     * Create a resource in storage.
     *
     * @param array $data Attributes to fill.
     *
     * @return \App\Models\User
     */
    public function create(array $data);
}