<?php

namespace App\Http\Services\V2\User;

use App\Http\Repositories\V2\User\UserRepositoryInterface;
use App\Http\Services\V1\User\UserService as UserServiceV1;
use App\Http\Services\V2\User\UserServiceInterface;

class UserService extends UserServiceV1 implements UserServiceInterface
{
    /**
     * Constructor.
     *
     * @param \App\Http\Repositories\V2\User\UserRepositoryInterface $user Repository instance.
     */
    public function __construct(private UserRepositoryInterface $user) {}
}