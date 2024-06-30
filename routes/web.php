<?php

use App\Livewire\Backend\Account\AccountLists;
use App\Livewire\Backend\Dashboard\Dashboart;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', Dashboart::class)->name('index');
    });

    //ANCHOR - [Admin Modules]
    Route::name('account_module.')->group(function () {

        //LINK - UserController
        Route::prefix('account')->name('account.')->group(function () {
            Route::get('/', AccountLists::class)->name('index');
        });
    });
});
