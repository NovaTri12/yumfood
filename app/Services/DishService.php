<?php

namespace App\Services;

use App\Models\Dishes;
use App\Repositories\DishRepository;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use DB;
use Illuminate\Support\Collection;

class DishService
{
    private $dish;

    public function __construct(DishRepository $dishRepository)
    {
        $this->dish = $dishRepository;
    }

    public function readDishByID(int $dishId): ?Dishes
    {
        return $this->dish->readDishByID($dishId);
    }

    public function updateDish(int $id, array $data): ?Dishes
    {
        $dish = null;

        DB::transaction(function () use (&$dish, $data, $id) {
            $dish = $this->dish->updateDish($id, $data);
        });

        return $dish;
    }

    public function deleteDish(int $dishId): ?Dishes
    {
        return $this->dish->deleteDish($dishId);
    }
}
