<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectServerController extends Controller
{
    public function index()
    {
        $data = [];
        $clients = DB::table('clients')->where('end_date', '>=', Carbon::now())->get()->groupBy('server')->toArray();
        foreach ($clients as $index => $client) {
            $data[$index] = round((count($client) * 100) / 3000, 1);
        }
        $aktiveClients = Client::where('end_date', '>', Carbon::now())->count();
        return view('select_server', compact('data', 'aktiveClients'));
    }
}
