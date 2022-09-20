<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Api\V1\UserController as UserControllerV1;
use App\Http\Services\V2\User\UserServiceInterface;

class UserController extends UserControllerV1
{
    /**
     * Constructor.
     *
     * @param \App\Http\Services\V2\User\UserServiceInterface $user Service instance.
     */
    public function __construct(private UserServiceInterface $user) {}
}