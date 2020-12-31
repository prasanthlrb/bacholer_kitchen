<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kitchen');
    }
    
    public function dashboard()
    {
        return view('kitchen.dashboard');
    }
}
