<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Rules\LatinLetters;
use App\Rules\LowerCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register(Request $request)
    {
        $data = Validator::make(
            [
                'login' => $request->get('login'),
                'parol' => $request->get('parol')
            ],
            [
                'login' => ['required', 'unique:users,login', 'min:5', 'max:8', 'alpha_num', new LowerCase, new LatinLetters],
                'parol' => ['required', 'min:5', 'max:8']
            ],
            [
                'login.*,[unique,min.max]' => '<p>Логин должен состоять только из маленьких латинских букв.</p> <p>К разрешенным символам относятся только цифры!Пример login12345</p>',
            ]
        );
        // dd($data->errors()->messages());
        if ($data->fails()) {
            return redirect()->back()->withErrors(['errors' => [$data->errors()->messages()['login'][0] ?? '', $data->errors()->messages()['parol'][0] ?? '']]);
        }
        try {
            $user = User::create($data);
            Auth::login($user);
            return redirect()->route('news');
        } catch (\Exception $e) {
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }
    public function update(UserUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            User::where('id', $request->user()->id)->update(['parol' => $data['parol']]);
            return view('profile', ['message' => 'Парол успешно измненен']);
        } catch (\Exception $e) {
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }
    public function login(Request $request)
    {
        $data = Validator::make(
            [
                'login' => $request->get('login'),
                'parol' => $request->get('parol')
            ],
            [
                'login' => ['required', 'min:5', 'max:8', 'exists:users,login', 'alpha_num', new LowerCase, new LatinLetters],
                'parol' => ['required', 'min:5', 'max:8']
            ]
        );
        // dd($data->errors()->messages());
        if ($data->fails()) {
            return redirect()->back()->withErrors(['errors' => [$data->errors()->messages()['login'][0] ?? '', $data->errors()->messages()['parol'][0] ?? '']]);
        }
        $data = $request->all();
        try {
            $user = User::where(['login' => $data['login'], 'parol' => $data['parol']])->first();
            if ($user) {
                Auth::login($user);
                return redirect()->route('news');
            }
            return redirect()->back()->withErrors(['message' => 'Неверный пароль']);
        } catch (\Exception $e) {
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main');
    }
}
