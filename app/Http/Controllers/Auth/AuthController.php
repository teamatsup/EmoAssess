<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectPath = '/';

    protected $username = 'id_number';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'id_number' => 'required|numeric|min:0|unique:users',
            'fname'     => 'required|max:255',
            'lname'     => 'required|max:255',
            'course'    => 'required|max:255',
            'gender'    => 'required|numeric',
            'age'       => 'required|numeric|min:0',
            'email'     => 'required|unique:users',
            'password'  => 'required|confirmed|min:6',
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
            'id_number' => $data['id_number'],
            'fname'     => $data['fname'],
            'lname'     => $data['lname'],
            'course'    => $data['course'],
            'gender'    => $data['gender'],
            'age'       => $data['age'],
            'email'     => $data['email'],
            'password'  => md5($data['password']),
            'privilege' => 1,
        ]);
    }
}
