<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getUsersWithFilters(Request $request);
    public function createUser(Request $request);
    public function updateUser(Request $request, User $user);
    public function checkUserValid(int $user_id, string $password);
}
