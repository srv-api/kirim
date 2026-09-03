<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;

Route::post(
    '/midtrans/notification',
    [SubscriptionController::class, 'notification']
)->name('midtrans.notification');