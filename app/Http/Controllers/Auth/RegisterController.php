<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Servicecenter;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:servicecenters'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'addr' => ['required'],
            'ph' =>['required','regex:/^[0-9]{10}$/'],
            'licenseno'=>['required'],
        ]);
    }
    protected function validatoruser(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:servicecenters'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'addr' => ['required'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function userregisterView()
    {
        return view('auth.register');
    }
    public function create(Request $request)
    {
        $this->validatoruser($request->all())->validate();
        
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['addr'],
        ]);*/
        $admin = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['addr'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login')->with('success','User Registered Successfully,Login Now');
    }
    public function showServicecenterRegisterForm()
    {
        return view('auth.registersc');
    }
    protected function createServiceCenter(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Servicecenter::create([
            'centername' => $request['name'],
            'email' => $request['email'],
            'cno' => $request['ph'],
            'address' => $request['addr'],
            'licenseno' => $request['licenseno'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/servicecenter')->with('success','Service Center Registered Successfully,Login Now');
    }
}
