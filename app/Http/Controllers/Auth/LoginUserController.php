<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31.07.2017
 * Time: 13:10
 */

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginUserController extends Controller
{

    use AuthUserTrait;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|filled|max:30',
            'password' => 'required|string|filled|min:6',
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function uniqueUsernameValidator(array $data)
    {
        return Validator::make($data, [
            'username' => 'unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
}