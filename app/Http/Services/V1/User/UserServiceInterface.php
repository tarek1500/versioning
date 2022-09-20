<?php

namespace App\Http\Services\V1\User;

use App\Http\Repositories\V1\User\UserRepositoryInterface;

interface UserServiceInterface
{
    /**
     * Constructor.
     *
     * @param \App\Http\Repositories\V1\User\UserRepositoryInterface $user Repository instance.
     */
    public function __construct(UserRepositoryInterface $user);

    /**
     * Get all resources from storage.
     *
     * @param array $relations Relations to load with resources.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function all(array $relations = []);

    /**
     * Get paginated resources from storage.
     *
     * @param string|int $perPage Per page count.
     * @param array $relations Relations to load with resources.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, array $relations = []);

    /**
     * Get a resource from storage.
     *
     * @param int $id Resource id.
     * @param array $relations Relations to load with resource.
     * @param bool $fail Throw an error or not.
     *
     * @return \App\Models\User
     */
    public function find($id, array $relations = [], bool $fail = true);

    /**
     * Create a resource in storage.
     *
     * @param array $data Attributes to fill.
     * @param array $relations Relations to load with resource.
     *
     * @return \App\Models\User
     */
    public function create(array $data, array $relations = []);

    /**
     * Update a resource in storage.
     *
     * @param \App\Models\User|int $user Resource instance or id.
     * @param array $data Attributes to fill.
     *
     * @return bool
     */
    public function update($user, array $data);

    /**
     * Delete a resource from storage.
     *
     * @param \App\Models\User|int $user Resource instance or id.
     *
     * @return bool
     */
    public function delete($user);
}