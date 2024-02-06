<?php

use App\Http\Controllers\PasteController;
use Illuminate\Support\Facades\Route;

Route::controller(PasteController::class)->group(function () {
    Route::get('/', "index")->name("home");
    Route::post('/', "store")->name("store");

    Route::get('/{paste}', "show")->name("show");
});
