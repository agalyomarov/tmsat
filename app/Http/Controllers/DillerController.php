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
        $clients = Client::where('diller_id', $request->user()->id)->get()->take($count)->reverse();
        $activeClient = Client::where('diller_id', $request->user()->id)->where('end_date', '>=', Date::now()->format('d.m.Y'))->count();
        return view('diller', compact('clients', 'count', 'activeClient'));
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
            $generalOstatatok = round(((strtotime($client->end_date) - strtotime(Carbon::now()->format('d.m.Y'))) / 86400) * 0.003, 2);
            User::where('id', $request->user()->id)->update(['balance' => round(($request->user()->balance) + $generalOstatatok, 2)]);
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
            $generalSummaVozvrata = round(((strtotime($client->end_date) - strtotime(Carbon::now()->format('d.m.Y'))) / 86400) * 0.003, 2);
            DB::beginTransaction();
            $client->update(['end_date' => null]);
            User::find($request->user()->id)->update(['balance' => round(($request->user()->balance) + $generalSummaVozvrata, 2)]);
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
            Client::where('diller_id', $idUser)->update(['server' => $server]);
            return response()->json(['status' => true]);
            DB::commit();
        } catch (\Exception $e) {
            // return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
