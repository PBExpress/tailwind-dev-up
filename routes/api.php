<?php

use App\Http\Controllers\Api\V1\Admin\MayApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // May
    Route::apiResource('mays', MayApiController::class);
});
