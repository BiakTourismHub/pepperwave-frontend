<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.index");
    }

    public function postLogin(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $response = Http::post('http://localhost:3000/login', [
                'email' => $email,
                'password' => $password,
            ]);

            $token = $response['token'];

            Session::put('token_auth', $token);

            $account = Http::withHeaders([
                'Authorization' => $token,
            ])->get('http://localhost:3000/account-info');

            $res = $account->json();

            // If you want to use the session helper method, you can use it like this:
            session(['token_auth' => $token, "user_id" => $res["uid"], "role" => $res["role"]]);

            if($token){
                return redirect('dashboard');
            }


        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function register()
    {
        return view("auth.register");
    }
}
