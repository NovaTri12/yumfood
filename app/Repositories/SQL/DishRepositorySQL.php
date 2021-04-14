<?php

namespace App\Repositories\SQL;

use App\Models\Dishes;
use App\Repositories\DishRepository;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Auth;
use Carbon\Carbon;
use Request;

class DishRepositorySQL implements DishRepository
{

    public function readDishByID(int $dishId): ?Dishes
    {
        return Dishes::find($dishId);
    }


    public function updateDish(int $id, array $data): ? Dishes
    {
        $dishes = $this->readDishByID($id);
        if (!isset($dishes)) return null;

        $dishes->update($data);

        return $dishes;
    }


    public function deleteDish(int $id): ?Dishes
    {
        $dishes = $this->readDishByID($id);
        if (!isset($dishes)) return null;

        $dishes->delete();

        return $dishes;
    }
}
