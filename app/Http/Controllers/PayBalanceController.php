<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSendBalanceToUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayBalanceController extends Controller
{
    public function index(Request $request)
    {
        $balance_histories = DB::table('balance_history')->where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $message = $request->session()->get('message');
        return view('pay_balance', compact('balance_histories', 'message'));
    }
    public function send(UserSendBalanceToUser $request)
    {
        $data = $request->all();
        try {
            if ($data['login'] == $request->user()->login) {
                return redirect()->back()->withErrors(['message' => 'Укажите другой другая login']);
            }
            DB::beginTransaction();
            $user = $request->user();
            $otherUser = User::where('login', $data['login'])->first();
            $user->update(['balance' => ($user->balance - $data['balance'])]);
            $otherUser->update(['balance' => ($otherUser->balance + $data['balance'])]);
            DB::table('balance_history')->insert([
                'user_id' => $user->id,
                'date' => Carbon::now(),
                'action' => '-',
                'summa' => $data['balance'],
                'operation' => 'Передача средства к ' . $data['login']
            ]);
            DB::table('balance_history')->insert([
                'user_id' => $otherUser->id,
                'date' => Carbon::now(),
                'action' => '+',
                'summa' => $data['balance'],
                'operation' => 'Получение средства от ' . $user->login
            ]);
            session()->flash('message', 'Средства успешна отправлен');
            DB::commit();
            return redirect()->route('pay_balance');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }
}
