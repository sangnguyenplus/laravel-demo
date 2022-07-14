<?php

use Illuminate\Support\Facades\Route;
use Org\Core\Http\Controllers\DemoController;

Route::group(['middleware' => ['web']], function () {
    Route::get('demo', [DemoController::class, 'demo']);
    Route::get('demo2', [DemoController::class, 'demo2']);
    Route::get('demo3', [DemoController::class, 'demo3']);
});

