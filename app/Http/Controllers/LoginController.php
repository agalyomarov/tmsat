<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register(UserStoreRequest $request)
    {
        $data = $request->validated();
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
            User::where('id', $request->user()->id)->update(['password' => $data['password']]);
            return view('profile', ['message' => 'Парол успешно измненен']);
        } catch (\Exception $e) {
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        try {
            $user = User::where(['login' => $data['login'], 'password' => $data['password']])->first();
            Auth::login($user);
            return redirect()->route('news');
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
