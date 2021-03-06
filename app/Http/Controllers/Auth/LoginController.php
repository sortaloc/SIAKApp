<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = '/notes';

    public function redirectTo(){

    // User role
        $role = Auth::user()->menuroles; 

    // Check user role
    switch ($role) {
        case 'admin,staff,penduduk':
            return '/dashboard';
        break;
        case 'staff':
            return '/dashboard';
        break;
        case 'penduduk':
            return '/home';
        break; 
        default:
            return '/'; 
        break;
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
