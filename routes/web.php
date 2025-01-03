<?php

use App\Http\Controllers\HolidayController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HolidayController::class, 'index']);


Route::get('/holidays/next7days', [HolidayController::class, 'getNext7DaysHolidays']);
Route::get('/holidays', [HolidayController::class, 'getNext7DaysHolidays']);
Route::get('/holidays/next365days', [HolidayController::class, 'getNextDaysHolidays']);


Route::get('/holidays/country', [HolidayController::class, 'getCountryHolidaysWithCY'])->name('getCountryHolidaysWithCY.form');
Route::get('/holidays/next7days/country', [HolidayController::class, 'getNext7DaysHolidayWC'])->name('next7daysWithC.form');
Route::get('/holidays/next1year', [HolidayController::class, 'getNext1YearHoliday'])->name('getNext1YearHoliday.form');