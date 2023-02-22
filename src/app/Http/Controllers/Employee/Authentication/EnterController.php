<?php

namespace App\Http\Controllers\Employee\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class EnterController extends Controller
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = 'employee/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employee.guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function enter()
    {
        return view('employee_module.auth_panel.enter');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employee');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        // dd($request->all());
        if ($this->attemptLogin($request)) {
            // dd($request->all());
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();
        $this->_registerOrLoginUser($user);
        $employee = Employee::where('email', $user->email)->first();
        if($employee) {
            Auth::login($employee);
            return redirect()->route('index');
        } else{
           return redirect()->route('enter'); 
        }
    }

    protected function _registerOrLoginUser($data)
    {
        // dd($data);
        $employee = Employee::where('email', $data->email)->first();
        if (!$employee) {
            $employee = new Employee();
            $employee->first_name = $data->user['given_name'];
            $employee->last_name = $data->user['family_name'];
            $employee->email = $data->email;
            $employee->provider_id = $data->id;
            $employee->save();
        }
    }

    public function logout(Request $request)
    {
        $this->guard('employee')->logout();
        $notify[] = ['success', 'Logout Successful.'];
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect()->route('employee.enter')->withNotify($notify);
    }
}
