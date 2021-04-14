<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use DB;

class userService
{
    private $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function login(string $email, string $password): Object
    {
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::guard('web')->user();

            // To log a user into the application by their ID
            Auth::guard('web')->loginUsingId($user);

            $key = Auth::guard('web')->user()->getToken()->accessToken ?? Auth::user()->createToken('yumfood')->accessToken;

            return response()->json([
                'success' => true,
                'key' => $key,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Invalid login credentials.',
            ], 500);
        }
    }
}
