<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        return "home";
    }
    public function getCountryNames()
    {
        $client = new Client();
        $response = $client->get('https://date.nager.at/api/v3/AvailableCountries');
        return $response->getBody();
    }

    public function getCountryHolidaysWithCY($countryCode, $year)
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/PublicHolidays/$year/$countryCode");
        return $response->getBody();
    }

    public function isHoliday($countryCode, $date)
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/IsTodayPublicHoliday/$countryCode?date=$date");
        return $response->getBody();
    }



    public function getNext7DaysHoliday($countryCode)
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide");
        $holidays = json_decode($response->getBody(), true);
        $next7DaysHolidays = array_filter($holidays, function ($holiday) use ($countryCode) {

            $country = $holiday['countryCode'];
            return $country == $countryCode;
        });
        $holidays = $next7DaysHolidays;
        return view('home', ['holidays' => $holidays]);
    }
    public function getNext7DaysHolidays()
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide");
        $holidays = json_decode($response->getBody(), true);
        return view('home', ['holidays' => $holidays]);
    }



}
