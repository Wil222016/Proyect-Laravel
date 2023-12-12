<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TypeMenuController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\DishTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\OfferedMenuController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DishOfferedMenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EntryRegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DrinkConsumptionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menus', function () {
    return view('menu/menus');
})->name('menus');


// Rutas de inicio de sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rutas de registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Ruta para cerrar sesión
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);



Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/reservas', function () {
        return view('menu/reservas');
    })->name('reservas');
    // people
    Route::resource('people', PersonController::class);

    // administrators
    Route::resource('administrators', AdministratorController::class);

    // clients
    Route::resource('clients', ClientController::class);

    // employees
    Route::resource('employees', EmployeeController::class);

    // semesters
    Route::resource('semesters', SemesterController::class);

    // type_menus
    Route::resource('type_menus', TypeMenuController::class);

    // drinks
    Route::resource('drinks', DrinkController::class);

    // dish_types
    Route::resource('dish_types', DishTypeController::class);

    // categories
    Route::resource('categories', CategoryController::class);

    // schedules
    Route::resource('schedules', ScheduleController::class);

    // offered_menus
    Route::resource('offered_menus', OfferedMenuController::class);

    // dishes
    Route::resource('dishes', DishController::class);


    Route::resource('dish_offered_menus', DishOfferedMenuController::class);

    // reservations
    Route::resource('reservations', ReservationController::class);
    Route::post('/guardar-reserva', [ReservationController::class, 'guardarReserva'])->name('guardar.reserva');

    // entry_registers
    Route::resource('entry_registers', EntryRegisterController::class);

    // payments
    Route::resource('payments', PaymentController::class);

    // drink_consumptions
    Route::resource('drink_consumptions', DrinkConsumptionController::class);
});
