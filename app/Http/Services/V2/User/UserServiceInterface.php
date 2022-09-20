<?php

namespace App\Http\Services\V2\User;

use App\Http\Services\V1\User\UserServiceInterface as UserServiceInterfaceV1;

interface UserServiceInterface extends UserServiceInterfaceV1
{
    /**
     * Constructor.
     */
    public function __construct();
}