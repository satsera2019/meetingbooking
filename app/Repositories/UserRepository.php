<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    public function getUsersWithFilters($request)
    {
        $query = User::query();
        if ($request->has('first_name') and $request->get('first_name') !== null) {
            $query->where('first_name', $request->get('first_name'));
        }
        if ($request->has('last_name') and $request->get('last_name') !== null) {
            $query->where('last_name', $request->get('last_name'));
        }
        if ($request->has('email') and $request->get('email') !== null) {
            $query->where('email', $request->get('email'));
        }
        return $query->get()->sortByDesc('id');
    }

    public function getAllUsers()
    {
        return User::all();
    }



    /* public function getAllOrders()
    {
        return Order::all();
    }

    public function getOrderById($orderId)
    {
        return Order::findOrFail($orderId);
    }

    public function deleteOrder($orderId)
    {
        Order::destroy($orderId);
    }

    public function createOrder(array $orderDetails)
    {
        return Order::create($orderDetails);
    }

    public function updateOrder($orderId, array $newDetails)
    {
        return Order::whereId($orderId)->update($newDetails);
    }

    public function getFulfilledOrders()
    {
        return Order::where('is_fulfilled', true);
    } */
}
