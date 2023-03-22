<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getUsersWithFilters(Request $request);
    public function createUser(Request $request);
    public function updateUser(Request $request, User $user);
    // public function getAllUsers();
    /* public function getAllOrders();
    public function getOrderById($orderId);
    public function deleteOrder($orderId);
    public function createOrder(array $orderDetails);
    public function updateOrder($orderId, array $newDetails);
    public function getFulfilledOrders(); */
}
