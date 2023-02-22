<?php

use Illuminate\Support\Facades\Route;


// V1 Routes
Route::prefix('v1')->group(base_path('routes/v1/index.php'));


//Default - fallback routes
Route::any('', function(){
    return response()->json([
        'status'    => false,
        'message'   => 'Page Not Found.',
    ], 404);
})->where('any', '.*');

Route::any('{any}', function(){
    return response()->json([
        'status'    => false,
        'message'   => 'Page Not Found.',
    ], 404);
})->where('any', '.*');
