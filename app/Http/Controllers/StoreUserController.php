<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\User\IUserService;

class StoreUserController extends Controller
{
    public function __construct(public IUserService $iUserService)
    {
        // 
    }

    /**
     * Save New User Details
     * 
     * @param  mixed $storeUserRequest
     * @return void
     */
    public function __invoke(StoreUserRequest $storeUserRequest)
    {
        $data = $storeUserRequest->validated();
        $this->iUserService->storeUser($data);
        return redirect()->back()->with('success', 'User details Stored successfully.');
    }
}
