<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Api\V1\UserController as UserControllerV1;
use App\Http\Services\V2\User\UserServiceInterface;
use Illuminate\Support\Facades\App;

class UserController extends UserControllerV1
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->user = App::make(UserServiceInterface::class);
    }
}