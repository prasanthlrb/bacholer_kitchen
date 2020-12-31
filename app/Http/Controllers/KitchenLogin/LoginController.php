<?php

namespace App\Http\Controllers\KitchenLogin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:kitchen');
    }

    public function showLoginForm()
    {
      return view('kitchen-login.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('kitchen')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('kitchen.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    // public function logout(){
    //   Auth::guard('kitchen')->logout();
    //   return redirect('/kitchen/login');
    // }
    public function logout(){
      Auth::guard('kitchen')->logout();
      $this->guard('kitchen')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/kitchen/login');
      //return redirect('/admin/login');
    }
}
