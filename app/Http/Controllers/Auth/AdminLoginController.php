<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:admin',['except' => ['logout']]);
  }
   public function showLoginForm()
   {
     return view('auth.admin-login');
   }

   public function login(request $request)
   {
     //Validate the form DOMCdataSection

$this->validate($request,[
  'email' => 'required|email',
  'password' => 'required|min:6'
]);
     //Attempt to log the user in
if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=>$request->password],$request->remember)){
  //If successful,then redirect to their intended locale_get_display_region

return redirect()->intended(route('admin.dashboard'));
};

     //if unsuccessful, then redirect back to the login with the form
     return redirect()->back()->withInput($request->only('email','remember'));
   }

   public function logout()
   {
       Auth::guard('admin')->logout();


       return redirect('/');
   }
}
