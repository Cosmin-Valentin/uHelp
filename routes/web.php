<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UHelp\TicketController;
use App\Http\Controllers\UHelp\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('uhelp')->group(function() {
    Route::get('/{status?}', [TicketController::class, 'index'])->name('uhelp.index');
    Route::post('/reply', [TicketController::class, 'storeReply'])->name('uhelp.storeReply');
    Route::post('/update-ticket/{ticket}', [TicketController::class, 'update'])->name('uhelp.updateTicket');
    Route::get('ticket/customer/{user?}', [TicketController::class, 'showCustomer'])->name('uhelp.showCustomer');

    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('uhelp.show');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('uhelp.destroy');
    Route::get('/ticket/create', [TicketController::class, 'create'])->name('uhelp.create');
    Route::post('/ticket/create', [TicketController::class, 'store'])->name('uhelp.store');

    Route::get('/ticket/category', [CategoryController::class, 'create'])->name('uhelp.createCategory');
    Route::post('/ticket/category', [CategoryController::class, 'store'])->name('uhelp.storeCategory');
    Route::delete('/ticket/category/{ticketCategory}', [CategoryController::class, 'destroy'])->name('uhelp.destroyCategory');
    Route::post('/update-category/{ticketCategory}', [CategoryController::class, 'update'])->name('uhelp.updateCategory');
});
