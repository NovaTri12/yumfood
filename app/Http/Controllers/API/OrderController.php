<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


use App\Services\OrderService;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrder(CreateOrderRequest $request)
    {
        $order = $this->orderService->createOrder($request->validated());

        if (!isset($order)) {
            return response()->json([
                'success' => false,
                'error'   => 'Failed to create new Order.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $order
        ]);
    }

    public function readOrderByID($orderId)
    {
        $order = $this->orderService->readOrderByID($orderId);

        if (!isset($order)) {
            return response()->json([
                'success'   => false,
                'error'     => 'Order Not Found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data'    => $order
        ]);
    }

    public function readOrderByUser($userId)
    {
        $order = $this->orderService->readOrderByUser($userId);

        if (!isset($order)) {
            return response()->json([
                'success'   => false,
                'error'     => 'Order Not Found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data'    => $order
        ]);
    }

    public function updateOrder(UpdateOrderRequest $request, int $id)
    {
        $order = $this->orderService->updateOrder($id, $request->validated());

        if (!isset($order)) {
            return response()->json([
                'success' => false,
                'error'   => 'Failed to update Order.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data'    => $order
        ]);
    }

    public function deleteOrder($orderId)
    {
        $orders = $this->orderService->deleteOrder($orderId);

        if (!isset($orders)) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to delete Order.'
            ], 500);
        }

        return response()->json(['success' => true]);
    }
}
