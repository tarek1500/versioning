<?php

namespace App\Http\Services\V2\User;

use App\Http\Repositories\V2\User\UserRepositoryInterface;
use App\Http\Services\V1\User\UserServiceInterface as UserServiceInterfaceV1;

interface UserServiceInterface extends UserServiceInterfaceV1
{
    /**
     * Constructor.
     *
     * @param \App\Http\Repositories\V2\User\UserRepositoryInterface $user Repository instance.
     */
    public function __construct(UserRepositoryInterface $user);
}