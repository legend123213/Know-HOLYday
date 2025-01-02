<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
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

    public function getCountryHolidaysWithCY(Request $request)
    {
        $countryCode = $request->query('countryCode'); // e.g., "CA"
        $year = $request->query('year');
        $client = new Client();




        $response = $client->get("https://date.nager.at/api/v3/PublicHolidays/$year/$countryCode");
        $holidays = json_decode($response->getBody(), true);

        return view('home', ['holidays' => $holidays]);

    }

    public function isHoliday($countryCode, $date)
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/IsTodayPublicHoliday/$countryCode?date=$date");
        return $response->getBody();
    }



    public function getNext7DaysHolidayWC($countryCode)
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide");
        $holidays = json_decode($response->getBody(), true);
        $next7DaysHolidays = array_filter($holidays, function ($holiday) use ($countryCode) {

            $country = $holiday['countryCode'];
            return $country == $countryCode;
        });
        $holidays = $next7DaysHolidays;
        $nameRoute = 'next7daysWithC.form';
        return view('home', ['holidays' => $holidays, 'nameRoute' => $nameRoute]);
    }
    public function getNext7DaysHolidays()
    {
        $client = new Client();
        $response = $client->get("https://date.nager.at/api/v3/NextPublicHolidaysWorldwide");
        $holidays = json_decode($response->getBody(), true);
        return view('home', ['holidays' => $holidays]);
    }



}
