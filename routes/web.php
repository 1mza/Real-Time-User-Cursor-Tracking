<?php

use App\Events\OrderDelivered;
use App\Events\OrderDispatched;
use App\Models\Message;
use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/room/{room}', function (Room $room) {
//    return view('room', ['room' => $room]);
//})->middleware('auth','verified')->name('room');



//Route::get('/orders/{order}', function (Order $order) {
//    return view('order', ['order' => $order]);
//});
//
//
//Route::get('/broadcast', function () {
//    sleep(5);
//    broadcast(new OrderDispatched(Order::find(1)));
//    sleep(5);
//    broadcast(new OrderDelivered(Order::find(1)));
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
