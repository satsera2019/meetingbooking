<?php

namespace App\Providers;

use App\Models\Room;
use App\Models\User;
use App\Repositories\BookingRepository;
use App\Repositories\BookingSlotRepository;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Repositories\Interfaces\BookingSlotRepositoryInterface;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\RoomRepository;
use App\Repositories\UserRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(BookingSlotRepositoryInterface::class, BookingSlotRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        View::composer('tablet-panel.layouts.navbar', function ($view) {
            $rooms = Room::all();
            $users = User::all();

            $radom_room = Room::inRandomOrder()->first();
            // $room = [];
            if ($radom_room !== null) {
                $room = $radom_room->first();
                $view->with('room', $room);
            }

            $view->with('rooms', $rooms);
            $view->with('users', $users);
          
        });
    }
}
