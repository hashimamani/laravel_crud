<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Validator;
use JsonSchema;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {

        return view('auth/login');

    }

    public function postLogin(Request $request)
    {
        $this->validator($request,['email'=>'required|email','password'=>'required']);
        return redirect($this->loginPath())
            ->withInput($request->only('email','remember'))
            ->withErrors(['email'=>$this->getFailedLoginMessage()]);

    }

    public function getLogout()
    {

    }

//    public function postRegister(Request $request)
//    {
//
//        $validator = $this->register->validator($request->all());
//        if ($validator->fails())
//        {
//            $this->throwValidationException($request,$validator);
//
//        }
//        $this->auth->login($this->registrar->create($request->all()));
//        return redirect($this->redirect());
//    }



}
