<?php

namespace App\Repositories\User;

use App\Models\User;

interface IUserRepository 
{
    /**
     * Store new User resource
     * 
     * @param array $data
     * @return \App\Models\User
     */
    public function storeUser(array $data) : User;
}