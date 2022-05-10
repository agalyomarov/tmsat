<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DillerController extends Controller
{
    public function index(Request $request)
    {
        $count = $request->query('count', 10);
        $clients = Client::where('diller_id', $request->user()->id)->get()->take($count)->reverse();;
        return view('diller', compact('clients', 'count'));
    }
    public function createClient(Request $request)
    {
        $data = $request->all();
        try {
            $rules = [
                'login' => ['required', 'alpha_num', 'unique:clients,login', 'min:4', 'max:10'],
                'parol' => ['required', 'min:4', 'max:10'],
                'server' => ['required'],
                'description' => []
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return response()->json(['status' => 'validate_error', 'messages' => $validator->errors()->all()]);
            } else {
                $data['diller_id'] = $request->user()->id;
                Client::create($data);
                return response()->json(['status' => true]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
        }
    }
    public function updateClient(Request $request)
    {
        $data = $request->all();
        try {
            $rules = [
                'login' => ['required', 'alpha_num', 'unique:clients,login,' . $data['client_id'], 'min:4', 'max:10'],
                'parol' => ['required', 'min:4', 'max:10'],
                'server' => ['required'],
                'description' => []
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return response()->json(['status' => 'validate_error', 'messages' => $validator->errors()->all()]);
            } else {
                $data['diller_id'] = $request->user()->id;
                $client_id = $data['client_id'];
                unset($data['client_id']);
                Client::where('id', $client_id)->where('diller_id', $request->user()->id)->update($data);
                return response()->json(['status' => true]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
        }
    }
    public function deleteClient(Request $request)
    {
        $data = $request->all();
        try {
            Client::where('id', $data['client_id'])->where('diller_id', $request->user()->id)->delete();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Произлошла серверная ошибка.Пожалюста перезагрузите стараницу']);
        }
    }
    public function buyPaket(Client $client, Request $request)
    {
        return view('pay', compact('client'));
        // dd($client);
    }
}
