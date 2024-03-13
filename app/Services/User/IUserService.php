<?php

namespace App\Services\User;

use App\Models\User;

interface IUserService 
{
    /**
     * Store new User resource
     * 
     * @param array $data
     * @return \App\Models\User
     */
    public function storeUser(array $data) : User;
}