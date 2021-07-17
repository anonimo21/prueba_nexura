<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    //return view('welcome');
    $empleado = App\Models\Empleado::findOrFail(2);
    // $empleado->roles()->attach([1,2]);
    // $empleado->roles()->sync([1,2,3,4]);
    // $empleado->roles()->detach(4);
    return $empleado->roles;
});

Route::resource('empleados', EmpleadoController::class);