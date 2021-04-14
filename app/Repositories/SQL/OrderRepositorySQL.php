<?php

namespace App\Repositories\SQL;

use App\Models\Order;
use App\Models\User;
use App\Models\Dishes;
use App\Models\OrderHistory;
use App\Repositories\OrderRepository;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Auth;
use Carbon\Carbon;
use Request;

class OrderRepositorySQL implements OrderRepository
{

    public function readOrderByID(int $orderId): ?Order
    {
        return Order::find($orderId);
    }

    public function readDishByID(array $dishId): ?Dishes
    {
        return Dishes::find($dishId);
    }

    public function createOrder(array $data): ?Order
    {
        $dishes = $this->getDishes($data['dishes']);
        foreach ($dishes as $dish) {
            $order = Order::firstOrCreate([
                'dishes_id'         => $dish['id'],
                'special_request'   => $data['special_request'],
                'quantity'          => $data['quantity']
            ]);
        }
        if (!isset($order)) return null;

        if (isset($order)) {
            if (isset($data['users'])) {
                $this->createOrderUser($order->id, $data['users']);
            }
        }


        return $order;
    }

    public function createOrderUser(int $orderId, array $users)
    {
        $userId = Auth::user()->id;
        OrderHistory::Create([
            'order_id' => $orderId,
            'user_id'  => $userId,
            'created_at' => now()
        ]);
    }

    public function updateOrder(int $id, array $data): ?Order
    {
        $order = $this->readOrderByID($id);
        if (!isset($order)) return null;

        $dishes = $this->getDishes($data['dishes']);

        foreach ($dishes as $dish) {
            $order->dishes_id = $dish['id'];
            $order->special_request = $data['special_request'];
            $order->quantity = $data['quantity'];
            $order->updated_at = now();
            $order->save();
        }

        if (!isset($order)) return null;

        if (isset($order)) {
            if (isset($data['users'])) {
                $this->updateOrderUser($order->id, $data['users']);
            }
        }

        return $order;
    }

    public function updateOrderUser(int $orderId, array $users)
    {
        $userId = Auth::user()->id;
        OrderHistory::firstOrCreate([
            'order_id' => $orderId,
            'user_id'  => $userId,
            'created_at' => now()
        ]);
    }


    public function deleteOrder(int $orderId): ?Order
    {
        $order = $this->readOrderByID($orderId);
        if (!isset($order)) return null;

        $order->delete();

        return $order;
    }

    public function getDishes(array $queryParams): Collection
    {
        $dishes = new Dishes;

        if (isset($queryParams['dishes']) && $queryParams['dishes'] != '') {
            $dishes = $dishes->where('name', 'LIKE', '%' . $queryParams['dishes'] . '%');
        }
        if (isset($queryParams['limit'])) {
            $dishes = $dishes->take($queryParams['limit']);
        }
        if (isset($queryParams['skip'])) {
            $dishes = $dishes->skip($queryParams['skip']);
        }

        $dishes = $dishes->get();

        return $dishes;
    }
}
