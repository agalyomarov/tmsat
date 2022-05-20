<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $data = [];
        $clients = DB::table('clients')->where('end_date', '>=', Carbon::now())->get()->groupBy('server')->toArray();
        foreach ($clients as $index => $client) {
            $data[$index] = round((count($client) * 100) / 3000, 1);
        }
        return view('index', compact('data'));
    }
}
