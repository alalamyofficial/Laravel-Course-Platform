<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    // public function redirectTo()
    // {
    //     if(Auth::user()->role_as == '1') //1 = Admin Login
    //     {
    //         // return redirect()->route('admin.dashboard');
    //         return 'admin/dashboard';
    //     }
    //     elseif(Auth::user()->role_as == '0') // Normal or Default User Login
    //     {
    //         // return redirect()->route('tweets');
    //         return '/home';

    //     }
    // }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role_as == 1 || auth()->user()->role_as == 10) {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('site');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }

    // public function showLoginForm(){

    //     return view('admin.login');

    // }

}
