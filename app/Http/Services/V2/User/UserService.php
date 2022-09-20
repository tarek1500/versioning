<?php

namespace App\Http\Services\V2\User;

use App\Http\Repositories\V2\User\UserRepositoryInterface;
use App\Http\Services\V1\User\UserService as UserServiceV1;
use App\Http\Services\V2\User\UserServiceInterface;
use Illuminate\Support\Facades\App;

class UserService extends UserServiceV1 implements UserServiceInterface
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->user = App::make(UserRepositoryInterface::class);
    }
}