<?php

use App\Http\Controllers\HolidayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hello = new HolidayController;
    return $hello->index();
});
Route::get("/countrynames", [HolidayController::class, 'getCountryNames']);
Route::get('/getNext7DaysHolidays/{id}', [HolidayController::class, 'getNext7DaysHoliday']);
Route::get('/getNext7DaysHolidays', [HolidayController::class, 'getNext7DaysHolidays']);
Route::get('/getHolidays', [HolidayController::class, 'getNext7DaysHolidays']);