<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements IUserRepository
{
    public function __construct(public User $userModel)
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
        return $this->userModel->create($data); 
    }
}