<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentApiController;
use App\Http\Controllers\ListingApiController;

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

//Public

/* TUTOR ROUTES START */

Route::post('/tutor/register', [AuthController::class, 'createTutor']);

/* TUTOR ROUTES END */

///////////////////////////////////////////////////////////////////////////

/* USER ROUTES START */

Route::post('/user/register', [AuthController::class, 'createUser']);

/* USER ROUTES END */

////////////////////////////////////////////////////////////////////////

/* LOGIN ROUTES START */

Route::post('/login', [AuthController::class, 'login']);

/* LOGIN ROUTES END */

Route::get('/listing/all', [ListingApiController::class, 'viewListing']);



//Protected 
Route::group(['middleware' => ['auth:sanctum']], function () {

    /* User Routes */
    Route::post('/profile', [AuthController::class, 'manageProfile']);
    Route::post('/user/profile', [AuthController::class, 'updateProfile']);

    /* Admin Routes - User */
    Route::get('/users', [AuthController::class, 'viewUser']);
    Route::get('/users/{id}/edit', [AuthController::class, 'editUser']);
    Route::put('/users/{id}', [AuthController::class, 'updateUser']);
    Route::delete('/users/{id}', [AuthController::class, 'destroyUser']);
    Route::post('/add/user', [AuthController::class, 'addUser']);

    /* Admin Routes - All Users */
    Route::get('/users/all', [AuthController::class, 'viewAllUser']);

    /* Admin Routes - Tutor */
    Route::get('/tutors', [AuthController::class, 'viewTutor']);
    Route::post('/add/tutor', [AuthController::class, 'addTutor']);

    /* Admin Routes - Listing */
    Route::get('/listings/all', [AuthController::class, 'viewListing']);

    /* Listing Routes */
    Route::post('/listings/create', [ListingApiController::class, 'create']);
    Route::get('/listings', [ListingApiController::class, 'view']);
    Route::get('/listings/{id}/edit', [ListingApiController::class, 'edit']);
    Route::put('/listings/{id}', [ListingApiController::class, 'update']);
    Route::delete('/listings/{id}', [ListingApiController::class, 'destroy']);

    
    /* Comment Routes */
    Route::get('/comments/{id}/edit', [CommentApiController::class, 'fetch']);
    Route::post('/add/comment', [CommentApiController::class, 'addComment']);

   
});

