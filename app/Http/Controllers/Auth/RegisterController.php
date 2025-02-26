<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname'   => 'required',
            'lastname'   => 'required',
            'password'   => 'required',
            'password_confirm'   => 'required',
            'email'   => 'required|email',
        ]);
        if ($request->password != $request->password_confirm) {
            return redirect()->back()->withInput()->withErrors('Passwords do not match.');
        }

        $duplicate = User::where('email', $request->email)->first();
        if ($duplicate) {
            return redirect()->back()->withInput()->withErrors('This email has already been used in the system.');
        }
        
        $name = substr($request['email'], 0 ,strpos($request['email'], "@"));
        $dateNow = date('y-m-d H:i:s');
        $result = User::insertGetId([
            'name' => $name,
            'email' => $request['email'],
            'password' =>bcrypt($request['password']),
            'fname' => $request['firstname'],
            'lname' => $request['lastname'],
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        $data = [
            'msgSuccess' => 'Data recording successful.',
        ];

        return view('auth.register')->with($data);
    }


}
