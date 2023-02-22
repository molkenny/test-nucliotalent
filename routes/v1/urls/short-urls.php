<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlsController;

Route::post('/short-urls', [UrlsController::class, 'shortUrls'])->middleware('custom.auth');
