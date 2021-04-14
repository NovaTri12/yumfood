<?php

namespace App\Repositories;


use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface OrderRepository
{
    // Read Section
    public function readOrderByID(int $orderId): ? Order;

    // Create Order
    public function createOrder(array $data): ? Order;

    //Update Section
    public function updateOrder(int $id, array $data): ? Order;

    //Delete Section
    public function deleteOrder(int $orderId): ? Order;


}
