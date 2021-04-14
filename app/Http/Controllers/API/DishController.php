<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dish\UpdateDishRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Services\DishService;

class DishController extends Controller
{
    private $dishService;

    public function __construct(DishService $dishService)
    {
        $this->dishService = $dishService;
    }

    public function readDishByID($dishId)
    {
        $dishes = $this->dishService->readDishByID($dishId);

        if(!isset($dishes)) {
            return response()->json([
                'success'   => false,
                'error'     => 'Dishes Not Found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data'    => $dishes
        ]);
    }

    public function updateDish(UpdateDishRequest $request, int $id)
    {
        $dishes = $this->dishService->updateDish($id, $request->validated());

        if (!isset($dishes)) {
            return response()->json([
                'success' => false,
                'error'   => 'Failed to update dish.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data'    => $dishes
        ]);
    }

    public function deleteDish($vendorId)
    {
        $vendors = $this->dishService->deleteDish($vendorId);

        if (!isset($vendors)) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to delete Dish.'
            ], 500);
        }

        return response()->json(['success' => true]);
    }
}
