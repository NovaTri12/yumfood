<?php

namespace App\Repositories;


use App\Models\Dishes;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface DishRepository
{
    // Read Section
    public function readDishByID(int $dishId): ? Dishes;

    //Update Section
    public function updateDish(int $id, array $data): ? Dishes;

    //Delete Section
    public function deleteDish(int $dishId): ? Dishes;


}
