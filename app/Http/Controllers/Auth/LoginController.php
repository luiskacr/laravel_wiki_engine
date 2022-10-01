<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;


class LoginController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.login');
    }

    /**
     * Validates and authenticates login credentials
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email','string'],
            'password' => ['required','string'],
        ]);

        $user = User::all()->where('email','=',$request->get('email'))->first();

        if( $user == null or !$user->active)
        {
            return redirect()->to('/login')->with('error', 'Username is not Active.');
        }

        if($this->validateRateLimit($request))
        {
            $block_time = RateLimiter::availableIn($this->throttleKey( $request->get('email'), $request->ip() ));

           return redirect()->to('/login')->with('error', 'Too Many login attempts. Please try again in ' .$block_time. ' seconds');
        }

        $rememberToken = ($request->request->getBoolean('remember')) ? true : false ;

        if(Auth::attempt($credentials,$rememberToken))
        {
            $request->session()->regenerate();

            RateLimiter::clear($this->throttleKey( $request->get('email'), $request->ip() ));

            return redirect()->intended('/home');
        }

        RateLimiter::hit($this->throttleKey( $request->get('email'), $request->ip() ));

        return redirect()->to('/login')->with('error', 'Incorrect username or password.');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect()->to('/login');
    }

    /**
     * Gets the URL of the defaulted image
     *
     * @param $name
     * @return string
     */
    public function getUrlAvatar($name)
    {
        return 'https://ui-avatars.com/api/?background=727cf5&color=fff&bold=true&name='.$name;
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @param LoginRequest $request
     * @return bool
     */
    public function validateRateLimit(LoginRequest $request)
    {
        $email = $request->get('email');

        $ip = $request->ip();


        if (! RateLimiter::tooManyAttempts($this->throttleKey($email,$ip), 5))
        {
            return false;
        }

        event(new Lockout($request));

        return true;

    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey($email,$ip)
    {
       return Str::transliterate(Str::lower($email.'|'.$ip));
    }

}
