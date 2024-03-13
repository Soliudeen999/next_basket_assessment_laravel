<?php

namespace App\Services\User;

use App\Events\UserCreatedEvent;
use App\Models\User;
use App\Repositories\User\IUserRepository;

class UserService implements IUserService
{
    public function __construct(public IUserRepository $iUserRepository)
    {
        // 
    }

    /**
     * Store new User resource
     * 
     * @param array $data
     * @return \App\Models\User
     */
    public function storeUser(array $data) : User
    {
        $user =  $this->iUserRepository->storeUser($data);
        event(new UserCreatedEvent($user));
        return $user;
    }
}