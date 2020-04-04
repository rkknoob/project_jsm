<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Model\AdminModel;
use Auth;
use Hash;
use Session;
use Log;
use Alert;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;


class LoginController extends Controller {


    public function index(){
        $admin = Auth::guard('admin')->user();
        if(!$admin == null){
            return redirect('cms/dashboard');
        }

        return view('backend.Auth.login');
    }

    public function checkLogin(Request $request)
    {
        \Log::info($request->all());
        $username = $request->input('email');
        $password = $request->input('password');

        $user = Auth::guard('admin')->user();

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 'Y'])) {
            return 1;
        } else {
            //return redirect('backoffice/login');
            \Log::info("login");
            return 0;
        }
    }

    //สำหรับทำการ Logout
    public function logout(){

        Auth::guard('admin')->logout();
        return redirect('/cms/home');
    }


}
