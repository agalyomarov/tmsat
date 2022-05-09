<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectServerController extends Controller
{
    public function index()
    {
        return view('select_server');
    }
}
