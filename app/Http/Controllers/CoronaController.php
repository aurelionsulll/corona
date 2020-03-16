<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Corona;

use App\Csvdata;

class CoronaController extends Controller
{
    public function parseImport(Request $request)
    {
        $x = 'https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/03-15-2020.csv';
        $csv = array_map('str_getcsv', file($x));
        $jsonString = file_get_contents($x);
        $data = json_decode($jsonString, true);
        return view('welcome')->with('csv',$csv);
    }
}

