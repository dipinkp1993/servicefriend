<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:wholesaler')->except('logout');
        $this->middleware('guest:servicecenter')->except('logout');

    }
    public function showServiceCenterLoginForm()
    {
        return view('auth.login', ['url' => 'servicecenter']);
    }

    public function servicecenterLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('servicecenter')->attempt(['email' => $request->email,'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/servicecenter');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showwholesalerLoginForm()
    {
        return view('auth.login', ['url' => 'wholesaler']);
    }
    public function wholesalerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('wholesaler')->attempt(['email' => $request->email,'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/wholesaler');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

   
}
