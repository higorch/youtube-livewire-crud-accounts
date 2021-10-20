<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Account\{
    Index as AdminIndex
};

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', AdminIndex::class)->name('index');
    });
});
