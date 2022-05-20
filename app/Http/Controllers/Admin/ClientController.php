<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $login_search = strtolower($request->query('login_search', ''));
        $clients = Client::where('login', 'LIKE', "%$login_search%")->paginate(50);
        return view('admin.client', compact('login_search', 'clients'));
    }
    public function delete(Client $client)
    {
        // dd($client);
        try {
            DB::beginTransaction();
            $client_end_date = $client->end_date ?? Carbon::now()->format('d.m.Y');
            $generalOstatatok = round(((strtotime($client_end_date) - strtotime(Carbon::now()->format('d.m.Y'))) / 86400) * 0.0033, 2);
            $diller = User::find($client->diller_id);
            User::where('id', $diller->id)->update(['balance' => round(($diller->balance) + $generalOstatatok, 2)]);
            $client->delete();
            DB::commit();
            return redirect()->route('admin.client');
        } catch (\Exception $e) {
            DB::rollback();
            // return response()->json(['status' => false, 'message' => $e->getMessage()]);
            return redirect('/');
        }
    }
}
