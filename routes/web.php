<?php

use App\Http\Controllers\HolidayController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HolidayController::class, 'index']);
// Route::get("/countrynames", [HolidayController::class, 'getCountryNames']);
Route::get('/getNext7DaysHolidays/{id}', [HolidayController::class, 'getNext7DaysHoliday']);
Route::get('/next7days', [HolidayController::class, 'getNext7DaysHolidays']);
Route::get('/getHolidays', [HolidayController::class, 'getNext7DaysHolidays']);
Route::get('/next365days', [HolidayController::class, 'getNextDaysHolidays']);


Route::get('/getCountryHolidaysWithCY', [HolidayController::class, 'getCountryHolidaysWithCY'])->name('getCountryHolidaysWithCY.form');
Route::get('/next7daysWithC', [HolidayController::class, 'getNext7DaysHolidayWC'])->name('next7daysWithC.form');
Route::get('/getNext1YearHoliday', [HolidayController::class, 'getNext1YearHoliday'])->name('getNext1YearHoliday.form');