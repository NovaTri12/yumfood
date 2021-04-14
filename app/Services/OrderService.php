<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use DB;
use Illuminate\Support\Collection;

class OrderService
{
    private $order;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->order = $orderRepository;
    }

    public function readOrderByID(int $orderId): ?Order
    {
        return $this->order->readOrderByID($orderId);
    }

    public function createOrder(array $data): ? Order
    {
        return $this->order->createOrder($data);
    }


    public function updateOrder(int $id, array $data): ?Order
    {
        $order = null;

        DB::transaction(function () use (&$order, $data, $id) {
            $order = $this->order->updateOrder($id, $data);
        });

        return $order;
    }

    public function deleteOrder(int $orderId): ?Order
    {
        return $this->order->deleteOrder($orderId);
    }
    
    public function readOrderByUser(int $userId): ? Order
    {
        return $this->vendor->readVendorByUser($userId);
    }

}
