<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\InformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ListingController::class, 'home']);


/* Tutor Routes */

Route::controller(TutorController::class)->group(function () {
    //Tutor Register
    Route::get('/tutors/register',  'create') 
    -> name('tutor.register') 
    -> middleware('guest');

    //Create Tutor
    Route::post('/tutors',  'store') -> name('tutor');

    //Tutor Logout
    Route::post('/tutors/logout',  'logout') -> name('tutor.logout')
    ->middleware('auth');


    /* // Admin Logout
    Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->middleware('auth'); */

    //Tutor Dashboard
    Route::get('/tutors/dashboard',  'dashboard') -> name('tutor.dashboard')->middleware('auth');

    //Show Tutor Profile
    Route::get('/tutor/profile',  'show') -> name('tutor.profile') ->middleware('auth');

    //Update Tutor
    Route::put('/tutor/profile',  'update') -> name('tutor.profile') ->middleware('auth');
});


/* Tutor Routes End */

///////////////////////////////////////////////

/* Login Routes */

//Login Form
Route::get('/users/login', [UserController::class, 'login']) -> name('user.login') ->middleware('guest');

//After Login
Route::post('/users/authenticate', [UserController::class, 'authenticate']) -> name('user.authenticate');

/* Login Routes End */



/////////////////////////////////////////////

/* Tutor Information Routes */

//Tutor Add Information
Route::get('/tutors/add/information', [InformationController::class, 'create']) -> name('tutor.registerInfo')->middleware('auth');

//Create Tutor Information
Route::post('/tutors/information', [InformationController::class, 'store']) -> name('tutor.information')->middleware('auth');

//Manage Information
Route::get('/information/manage', [InformationController::class, 'manage'])-> name('tutor.manage')->middleware('auth');

//Update Information
Route::put('/information/update', [InformationController::class, 'update']) -> name('tutor.infoUpdate')->middleware('auth');

/* Tutor Information Routes End*/


///////////////////////////////////////////////////


/* Listing Routes */

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage']) -> name('listing.manage');

//All Listing
Route::get('/all/listings', [ListingController::class, 'index']) -> name('all.listing') ;

//Create Listings
Route::get('/listings/create', [ListingController::class, 'create']) -> name('listing.create')->middleware('auth');

//Store All Listings
Route::post('/listings', [ListingController::class, 'store']) -> name('listing')->middleware('auth');

//Edit Listings
Route::get('/listings/{id}/edit', [ListingController::class, 'edit']) ->middleware('auth');
// Route::get('/users/{id}/edit', [UserController::class, 'edit']);            monir

//Update Listings
Route::put('/listings/{id}', [ListingController::class, 'update'])->middleware('auth');
// Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth');   monir
//Delete Listings
Route::delete('/listings/{id}', [ListingController::class, 'delete'])->middleware('auth');

//Single Page Listing
Route::get('/listings/{id}', [ListingController::class, 'show']);



/* Listing Routes End */

///////////////////////////////////////////////////


/* User Routes */

//User Registration
Route::get('/users/register', [UserController::class, 'create']) -> name('user.create') ->middleware('guest');

//Create User
Route::post('/users', [UserController::class, 'store']) -> name('user');

//User Logout
Route::post('/users/logout', [UserController::class, 'logout']) -> name('user.logout') ->middleware('auth');

//User Dashboard
Route::get('/users/dashboard', [UserController::class, 'dashboard']) -> name('user.dashboard')->middleware('auth');
//edit
// Route::get('/users/{id}/edit', [UserController::class, 'edituser'])->middleware('auth');


//Show User Profile
Route::get('/user/profile', [UserController::class, 'show']) -> name('user.profile') ->middleware('auth');

//Update User
Route::put('/user/profile', [UserController::class, 'update']) -> name('user.profile') ->middleware('auth');



// Admin Panel

// Admin Dashboard/////////////////////////////////////////////////
Route::get('/admin', [AdminController::class, 'adminDashboard'])->middleware('auth');

Route::get('/adminOperations/user', [AdminController::class, 'users'])->middleware('auth');

Route::get('/adminOperations/tutor', [AdminController::class, 'tutors'])->middleware('auth');
// delete user through Admin
Route::delete('adminOperations/user/{id}', [AdminController::class, 'deleteUser'])->middleware('auth');
// Show manage listing
Route::get('/adminOperations/manageListing', [AdminController::class, 'manageListing'])->middleware('auth');
// edit manage listing
Route::get('/adminOperations/manageListing/listings/{listing}/edit', [ListingController::class, 'edituser'])->middleware('auth');
Route::delete('adminOperations/listings/{id}', [AdminController::class, 'deleteList'])->middleware('auth');
// delete listing
//admin user edit
Route::get('/admin/edit/{id}', [AdminController::class, 'edituser']);


//Comment
Route::post('/listings/show/{id}', [CommentController::class, 'storeComment'])->middleware('auth');






    