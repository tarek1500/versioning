<?php

namespace App\Http\Repositories\V2\User;

use App\Http\Repositories\V1\User\UserRepository as UserRepositoryV1;
use App\Models\User;

class UserRepository extends UserRepositoryV1 implements UserRepositoryInterface
{
    /**
     * Get paginated resources from storage.
     *
     * @param int $perPage Per page count.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage)
    {
        return User::orderBy('id', 'desc')
            ->paginate($perPage);
    }
}