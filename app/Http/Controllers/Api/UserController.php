<?php


namespace App\Http\Controllers\Api;


use App\User;

class UserController extends BaseController
{
    public function info()
    {
        $user = auth()->user();
        return [
            'success' => true,
            'data' => $user->toArray(),
        ];
    }
}
