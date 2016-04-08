<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use Validator;
use JsonSchema;
use App\Http\Controllers\Controller;


use App\Providers;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    public function index()
    {
        $results = profile::get();
        return view('auth.success', compact('results'));

    }




    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }

    public function getLogin()
    {

        return view('auth/login');

    }

    protected function validator(array $data)
    {


    }

    public function getRegister()
    {
        return view('auth/register');

    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))

        ];

        Profile::insert($data);


       return Redirect::route('success');


    }

    public function postLogin()
    {

    }

    public function getLogout()
    {

    }
}
