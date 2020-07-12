<?php

use App\Bookable;
use Illuminate\Http\Request;

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


// Route::get('bookables', function (Request $request) {
//     return Bookable::all();
// });
// Route::get('bookables/{id}/{optional?}', function (Request $request, $id, $optional = null) {
//     return Bookable::find($id);
// });
// Route::get('bookables','Api\BookableController@index');
// Route::get('bookables/{id}','Api\BookableController@show');
Route::apiResource('bookables', 'Api\BookableController')->only(['index', 'show']);
Route::get('bookables/{bookable}/availability', 'Api\BookableAvailabilityContorller')
        ->name('bookables.availability.show');
Route::get('bookables/{bookable}/reviews', 'Api\BookableReviewController')
        ->name('bookables.reviews.show');
Route::apiResource('reviews', 'Api\ReviewController')->only(['show']);
