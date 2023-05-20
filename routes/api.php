<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('survey')->group(function () {
    Route::get('/', [SurveyController::class, 'getSurveys']);
});

Route::get('/flushconfig', function() {
    $output = [];
    Artisan::call('cache:clear', [], $output);
    Artisan::call('route:clear', [], $output);
    Artisan::call('view:clear', [], $output);
    Artisan::call('config:cache', [], $output);
    return true;
});
