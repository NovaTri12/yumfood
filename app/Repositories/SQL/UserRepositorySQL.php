<?php

namespace App\Repositories\SQL;

use App\Models\User;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Auth;
use Carbon\Carbon;

class UserRepositorySQL implements UserRepository
{

    public function readUserByID(string $userId): ? User
    {
        return User::find($userId);
    }

}
