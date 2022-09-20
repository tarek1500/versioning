<?php

namespace App\Http\Repositories\V1\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Get all resources from storage.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Get paginated resources from storage.
     *
     * @param int $perPage Per page count.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage)
    {
        return User::latest()
            ->paginate($perPage);
    }

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
    public function find($id, bool $fail = true)
    {
        if ($fail)
        {
            return User::findOrFail($id);
        }

        return User::find($id);
    }

    /**
     * Create a resource in storage.
     *
     * @param array $data Attributes to fill.
     *
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        return User::create($data);
    }
}