<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Input;

class HomeController extends Controller
{
    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $response = Request::create('/api/auth/login', 'POST',[
            'email' =>  $email,
            'password' => $password
        ]);
        $response->headers->set('Authorization','Bearer'.'token');

        $result = Route::dispatch($response);

        return view('content/users');
        //return redirect()->route('list');
    }

    public function register(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $response = Request::create('/api/user', 'POST',[
            'name' => $name,
            'email' =>  $email,
            'password' => $password
        ]);
        $response->headers->set('Authorization','Bearer'.'_token');

        $result = Route::dispatch($response);

        return dd($result);
    }


}
