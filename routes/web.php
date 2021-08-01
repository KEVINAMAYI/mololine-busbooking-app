<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminReportsController;
use App\Http\Controllers\AdminVehiclesController;

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

//authentication route
Auth::routes();

//can be accessed without login  
Route::get('/',[FrontEndController::class,'getAvailbaleVehicles']);
Route::get('/index',[FrontEndController::class,'getAvailbaleVehicles']);
Route::get('/about', function () { return view('about'); });
Route::get('/services', function () { return view('services'); });
Route::get('/contact', function () { return view('contact'); });

//User middleware --> user must login to access
Route::group(['middleware' => 'App\Http\Middleware\Authenticate'], function()
{

    Route::get('/ticket', function () { return view('ticket'); });
    Route::get('/my-bookings/{userid}',[FrontEndController::class,'displayBookings']);
    Route::get('/book-seat/{vehicleid}',[FrontEndController::class,'getVehicleBookingDetails']);
    Route::post('/confirm-booking',[FrontEndController::class,'getConfirmationDetails']);
    Route::post('/submit-booking-details',[FrontEndController::class,'bookSeat']);
    Route::get('/get-booking-details/{bookingid}',[FrontEndController::class,'getBookingDetails']);



});

//Admin middleware --> can only be acccessed by users with the role of Admin
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('/admin', function(){ return view('admin/index'); });

    // Bookings and ticket routes
    Route::get('/admin/bookings',[AdminVehiclesController::class,'displayBookings']);
    Route::get('/admin/ticket', function(){ return view('admin/bookings/ticket'); });
    Route::get('/admin/display_book_seat', [AdminVehiclesController::class,'getBookingsVehicles']);
    Route::post('/admin/book_seat', [AdminVehiclesController::class,'bookSeat']);
    Route::get('/admin/delete_booking/{seat_booking}', [AdminVehiclesController::class,'deleteBooking']);
    Route::post('/admin/edit_booking', [AdminVehiclesController::class,'editBooking']);
    Route::get('/admin/available_seats/{vehicleid}', [AdminVehiclesController::class,'getAvailableSeats']);


    //Reports routes
    Route::get('/admin/reports', function(){ return view('admin/reports/list_reports'); });
    Route::get('/admin/generate_reports_data', [AdminReportsController::class,'reports']);

    //Users routes
    Route::get('/admin/users',[AdminUsersController::class,'getUsers']);
    Route::get('/admin/createuser',[AdminUsersController::class,'showUserCreationForm']);
    Route::get('/admin/deleteuser/{user}',[AdminUsersController::class,'deleteUser']);
    Route::post('/admin/storeuser',[AdminUsersController::class,'storeUser']);
    Route::get('/admin/edit_user/{user}',[AdminUsersController::class,'showUserEditForm']);
    Route::post('/admin/updateuser/{user}',[AdminUsersController::class,'editUser']);
    

    //vehicle routes
    Route::get('/admin/vehicles',[AdminVehiclesController::class,'getVehicles']);
    Route::post('/admin/createvehicle', [AdminVehiclesController::class,'createVehicle']);
    Route::get('/admin/deletevehicle/{vehicle}', [AdminVehiclesController::class,'deleteVehicle']);
    Route::get('/admin/edit_vehicle/{vehicleid}',[AdminVehiclesController::class,'showVehicleEditForm']);
    Route::post('/admin/update_vehicle/{vehicle}',[AdminVehiclesController::class,'updateVehicle']);
    Route::post('/admin/shedule_vehicle',[AdminVehiclesController::class,'sheduleVehicle']);
    Route::post('/admin/reshedule_vehicle',[AdminVehiclesController::class,'rescheduleVehicle']);

    //logout route
    Route::get('/admin/logout', function(){ return redirect('/login')->with(Auth::logout()); });


});
