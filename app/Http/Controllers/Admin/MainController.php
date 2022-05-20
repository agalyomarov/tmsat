<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminDillerStoreRequest;
use App\Http\Requests\Admin\AdminDillerUpdateRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $login_search = strtolower($request->query('login_search', ''));
        $diller = User::find($request->query('diller'));
        $dillers = User::where('login', 'LIKE', "%$login_search%")->paginate(50);
        // dd($dillers);
        return view('admin.diller', compact('dillers', 'diller', 'login_search'));
    }
    public function store(AdminDillerStoreRequest $request)
    {
        $data = $request->validated();
        try {
            User::create($data);
            return redirect()->route('admin.diller');
        } catch (\Exception $e) {
            return response()->view('error.500', ['message' => $e->getMessage()]);
        }
    }
    public function update(AdminDillerUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $diller_id = $data['diller_id'];
            unset($data['diller_id']);
            User::where('id', $diller_id)->update($data);
            return redirect()->route('admin.diller');
        } catch (\Exception $e) {
            return response()->view('errors.500', ['message' => $e->getMessage()]);
        }
    }
    public function delete(User $diller)
    {
        try {
            Client::where('diller_id', $diller->id)->delete();
            DB::table('balance_history')->where('user_id', $diller->id)->delete();
            $diller->delete();
            return redirect()->route('admin.diller');
        } catch (\Exception $e) {
            // return response()->view('errors.500', ['message' => $e->getMessage()]);
            return redirect('/');
        }
    }
}
