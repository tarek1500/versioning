<?php

namespace App\Http\Services\V1\User;

use App\Http\Repositories\V1\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    /**
     * Constructor.
     *
     * @param \App\Http\Repositories\V1\User\UserRepositoryInterface $user Repository instance.
     */
    public function __construct(private UserRepositoryInterface $user) {}

    /**
     * Get all resources from storage.
     *
     * @param array $relations Relations to load with resources.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function all(array $relations = [])
    {
        $users = $this->user->all();
        $count = $users->count();

        $users = new LengthAwarePaginator($users, $count, $count === 0 ? 1 : $count);

        if ($relations)
        {
            $users->load($relations);
        }

        return $users;
    }

    /**
     * Get paginated resources from storage.
     *
     * @param string|int $perPage Per page count.
     * @param array $relations Relations to load with resources.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, array $relations = [])
    {
        if ($perPage === '*')
        {
            return $this->all($relations);
        }

        if (($perPage = intval($perPage)) === 0)
        {
            $perPage = 15;
        }

        $users = $this->user->paginate($perPage);

        if ($relations)
        {
            $users->load($relations);
        }

        return $users;
    }

    /**
     * Get a resource from storage.
     *
     * @param int $id Resource id.
     * @param array $relations Relations to load with resource.
     * @param bool $fail Throw an error or not.
     *
     * @return \App\Models\User
     */
    public function find($id, array $relations = [], bool $fail = true)
    {
        $user = $this->user->find($id, $fail);

        if ($relations)
        {
            $user->load($relations);
        }

        return $user;
    }

    /**
     * Create a resource in storage.
     *
     * @param array $data Attributes to fill.
     * @param array $relations Relations to load with resource.
     *
     * @return \App\Models\User
     */
    public function create(array $data, array $relations = [])
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->user->create($data);

        if ($relations)
        {
            $user->load($relations);
        }

        return $user;
    }

    /**
     * Update a resource in storage.
     *
     * @param \App\Models\User|int $user Resource instance or id.
     * @param array $data Attributes to fill.
     *
     * @return bool
     */
    public function update($user, array $data)
    {
        if (!($user instanceof User))
        {
            $user = $this->find($user);
        }

        return $user->update($data);
    }

    /**
     * Delete a resource from storage.
     *
     * @param \App\Models\User|int $user Resource instance or id.
     *
     * @return bool
     */
    public function delete($user)
    {
        if (!($user instanceof User))
        {
            $user = $this->find($user);
        }

        return $user->delete();
    }
}