<?php
/**
 * Created by PhpStorm.
 * User: Hector Jose
 * Date: 5/07/14
 * Time: 17:40
 */

class AuthController extends BaseController {

    public function login()
    {
        $data = Input::only('email','password','remember');
        //dd($data);

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if(Auth::attempt($credentials, $data['remember']))
        {
            return Redirect::back();
        }

        return Redirect::back()->with('login_error', 1);

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
} 