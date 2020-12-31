<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    public function editProfile()
    {
        return view('customer.edit_profile');
    }
}

