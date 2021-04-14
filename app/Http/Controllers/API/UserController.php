<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;


class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request) 
    {
        $response = $this->service->login($request->email, $request->password);
        
        return $response;
    }
    
    public function getUser(Request $request)
    {
        return $request->user();
    }
}
