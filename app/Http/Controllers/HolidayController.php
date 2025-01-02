<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HolidayController extends Controller
{

    // controller for getting the holidays in the home page 
    public function index()
    {
        $va = get_IP_address();
        $countryCode = $va['CountryCode'];
        $year = $va['year'];
        $client = new Client();
        if ($countryCode == "ALL") {
            $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide/");
            $holidays = json_decode($response->getBody(), true);
            return view('home', ['holidays' => $holidays]);
        }
        $response = $client->get("https://date.nager.at/api/v3/PublicHolidays/$year/$countryCode");
        $holidays = json_decode($response->getBody(), true);
        $nameRoute = 'next7daysWithC.form';
        return view('home', ['holidays' => $holidays, 'nameRoute' => $nameRoute]);


    }
    public function getCountryNames()
    {
        $client = new Client();
        $response = $client->get('https://date.nager.at/api/v3/AvailableCountries');
        return $response->getBody();
    }

    // controller for getting the holidays in the page using the country code and year in home page using filter 

    public function getCountryHolidaysWithCY(Request $request)
    {
        $countryCode = $request->query('countryCode');
        $year = $request->query('year');
        $client = new Client();

        $response = $client->get("https://date.nager.at/api/v3/PublicHolidays/$year/$countryCode");
        $holidays = json_decode($response->getBody(), true);

        return view('home', ['holidays' => $holidays]);

    }
    // controller for getting the holidays in the page using the country code in next one year page using filter
    public function getNext1YearHoliday(Request $request)
    {
        $countryCode = $request->query('countryCode');
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidays/$countryCode");
        $holidays = json_decode($response->getBody(), true);
        return view('next365', ['holidays' => $holidays]);
    }
    public function getNextDaysHolidays()
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide");
        $holidays = json_decode($response->getBody(), true);
        return view('next365', ['holidays' => $holidays]);
    }


    public function isHoliday(Request $request)
    {
        $countryCode = $request->query('countryCode');
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidays/$countryCode");
        $holidays = json_decode($response->getBody());
        return view('next3', ['holidays' => $holidays]);
    }

    // controller for getting the next 7 days holidays in the page using the country code 

    public function getNext7DaysHolidayWC(Request $request)
    {
        $countryCode = $request->query('countryCode');
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide");
        $holidays = json_decode($response->getBody(), true);
        $next7DaysHolidays = array_filter($holidays, function ($holiday) use ($countryCode) {

            $country = $holiday['countryCode'];
            return $country == $countryCode;
        });
        $holidays = $next7DaysHolidays;
        $nameRoute = 'next7daysWithC.form';
        return view('next7', ['holidays' => $holidays, 'nameRoute' => $nameRoute]);
    }
    // controller for getring the next 7 days holidays in main 7 days page
    public function getNext7DaysHolidays()
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide");
        $holidays = json_decode($response->getBody(), true);
        return view('next7', ['holidays' => $holidays]);
    }



}
