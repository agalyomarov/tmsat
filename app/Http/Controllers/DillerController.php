<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Rules\LatinLetters;
use App\Rules\LowerCase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DillerController extends Controller
{
    public function index(Request $request)
    {
        $count = $request->query('count', 10);
        $search = $request->query('search', '');
        $countAllClients = Client::where('diller_id', $request->user()->id)->get()->count();
        if ($count == 1000) {
            $clients = Client::where('diller_id', $request->user()->id)->where('login', 'LIKE', "%$search%")->orderBy('id', 'DESC')->paginate($count);
        } else {
            $clients = Client::where('diller_id', $request->user()->id)->where('login', 'LIKE', "%$search%")->orderBy('id', 'DESC')->get()->take($count);
        }
        // dd($clients);
        $activeClient = Client::where('diller_id', $request->user()->id)->where('end_date', '>=', Date::now()->format('d.m.Y'))->count();
        return view('diller', compact('clients', 'count', 'activeClient', 'search', 'countAllClients'));
    }
    public function createClient(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $rules = [
                'login' => ['required', 'alpha_num', 'unique:clients,login', 'min:4', 'max:10', new LowerCase, new LatinLetters],
                'parol' => ['required', 'min:4', 'max:10'],
                'server' => ['required'],
                'description' => []
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return response()->json(['status' => 'validate_error', 'messages' => $validator->errors()->all()]);
            }
            $data['diller_id'] = $request->user()->id;
            Client::create($data);
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
        }
    }
    public function updateClient(Request $request)
    {
        $data = $request->all();
        try {
            $rules = [
                'login' => ['required', 'alpha_num', 'unique:clients,login,' . $data['client_id'], 'min:4', 'max:10', new LowerCase, new LatinLetters],
                'parol' => ['required', 'min:4', 'max:10'],
                'server' => ['required'],
                'description' => []
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return response()->json(['status' => 'validate_error', 'messages' => $validator->errors()->all()]);
            }
            DB::beginTransaction();
            $data['diller_id'] = $request->user()->id;
            $client_id = $data['client_id'];
            unset($data['client_id']);
            Client::where('id', $client_id)->where('diller_id', $request->user()->id)->update($data);
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
        }
    }
    public function deleteClient(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $client = Client::where('id', $data['client_id'])->where('diller_id', $request->user()->id)->first();
            $generalOstatatok = round(((strtotime($client->end_date) - strtotime(Carbon::now()->format('d.m.Y'))) / 86400) * 0.0033, 2);
            User::where('id', $request->user()->id)->update(['balance' => round(($request->user()->balance) + $generalOstatatok, 2)]);
            DB::table('balance_history')->insert([
                'user_id' => $request->user()->id,
                'date' => Carbon::now(),
                'action' => '+',
                'summa' => $generalOstatatok,
                'operation' => 'Удален клиент ' . $client->login
            ]);
            $client->delete();

            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            // return response()->json(['status' => false, 'message' => $e->getMessage()]);
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
        }
    }
    public function buyPaket(Client $client, Request $request)
    {
        return view('pay', compact('client'));
    }
    public function buyPaketStore(Request $request)
    {
        $data = $request->json()->all();
        try {
            $diller = $request->user();
            $client = Client::where('id', $data['client_id'])->where('diller_id', $diller->id)->first();
            $generalPrice = intval($data['dateForPaket']) * 0.10;
            $ostatok = $diller->balance - $generalPrice;
            if ($diller->balance < $generalPrice) {
                return response()->json(['status' => false, 'message' => 'Не достаточна средства']);
            }
            DB::beginTransaction();
            $dateEndPaket = Carbon::now()->addMonth($data['dateForPaket']);
            if (!$client->end_date) {
                $client->update(['end_date' => $dateEndPaket]);
            } else {
                $addToEndDate = Carbon::parse($client->end_date)->addMonth($data['dateForPaket']);
                $client->update(['end_date' => $addToEndDate]);
            }
            User::where('id', $diller->id)->update(['balance' => $ostatok]);
            DB::table('balance_history')->insert([
                'user_id' => $diller->id,
                'date' => Carbon::now(),
                'action' => '-',
                'summa' => $generalPrice,
                'operation' => 'Куплен пакет для клиента ' . $client->login . ' на ' . $data['dateForPaket'] . ' месяц'
            ]);
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
            // return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function stopClient(Request $request)
    {
        $data = $request->json()->all();
        try {
            $diller = $request->user();
            $client = Client::where('id', $data['client_id'])->where('diller_id', $diller->id)->first();
            if (!$client->end_date) {
                return response()->json(['status' => false, 'message' => 'У клиента нету пакета']);
            }
            $generalSummaVozvrata = round(((strtotime($client->end_date) - strtotime(Carbon::now()->format('d.m.Y'))) / 86400) * 0.0033, 2);
            DB::beginTransaction();
            $client->update(['end_date' => null]);
            User::find($request->user()->id)->update(['balance' => round(($request->user()->balance) + $generalSummaVozvrata, 2)]);
            DB::table('balance_history')->insert([
                'user_id' => $diller->id,
                'date' => Carbon::now(),
                'action' => '+',
                'summa' => $generalSummaVozvrata,
                'operation' => 'Остановлен пакет для клиента ' . $client->login
            ]);
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
            // return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function setServer(Request $request)
    {
        try {
            // return response()->json($request->user()->id);
            DB::beginTransaction();
            $idUser = $request->user()->id;
            $server = intval($request->json('server'));
            $clients = Client::where(['diller_id' => $idUser])->whereIn('id', $request->json('clients'))->update(['server' => $server]);
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
            // return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function buyPaketAllUser(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $request->user();
            $paketDay = intval($request->json('paket')) * 30;
            $paketPrice = $paketDay * 0.0033;
            $generalPricePaket = round(count($request->json('clients')) * $paketPrice, 2);
            if (floatval($user->balance) < $generalPricePaket) {
                return response()->json(['status' => false, 'message' => "Не достотачна средства, сумма покупки $generalPricePaket $"]);
            }
            $user->balance = round(floatval($user->balance) - $generalPricePaket, 2);
            foreach ($request->json('clients') as $client) {
                $client = Client::find($client);
                $clientEndDate = $client->end_date !== null ? strtotime($client->end_date) : strtotime(Carbon::now()->format('d.m.Y'));
                $client->end_date = date('Y-m-d H:i:s', $clientEndDate + ($paketDay * 86400));
                $client->save();
            }
            $user->save();
            DB::table('balance_history')->insert([
                'user_id' => $user->id,
                'date' => Carbon::now(),
                'action' => '-',
                'summa' => $generalPricePaket,
                'operation' => 'Куплен пакет для  ' . count($request->json('clients')) . ' клиента.'
            ]);
            DB::commit();
            return response()->json([['status' => true]]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
            // return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
