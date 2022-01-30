<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
        public function __construct() {
            $this->middleware('auth:api', ['except' => ['create', 'login', 'unauthorized']]);
        }
        
        // endpoint = http://127.0.0.1:8000/api/user
        public function create(Request $request){
    
            $message['success'] = false;
    
            // Verificação
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string|max:255',
            ]);

            if($validator->fails()){
                return response()->json(['success'=>false, 'message'=>$validator->errors()->all()]);
            }
    
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $emailExists = User::where('email', $email)->count();

            if($emailExists === 0) {

                $newUser = new User();
                $newUser->name = $name;
                $newUser->email = $email;
                $newUser->password = Hash::make($password);
                $newUser->save();

                $token = auth()->attempt([
                    'email' => $email,
                    'password' => $password
                ]);

                if(!$token) {
                    $message['error'] = 'Ocorreu um erro!';
                    return $message;
                }

                $info = auth()->user();
                $info['avatar'] = url('media/avatars/'.$info['avatar']);
                $message['success'] = true;
                $message['data'] = $info;
                $message['token'] = $token;


            } else {
                $message['error'] = 'E-mail já cadastrado!';
                return $message;
            }

            
            return $message;
        }

        // endpoint = http://127.0.0.1:8000/api/auth/login
        public function login(Request $request) {
            $message['success'] = false;

            $email = $request->email;
            $password = $request->password;

            $token = auth()->attempt([
                'email' => $email,
                'password' => $password
            ]);

            if(!$token) {
                $message['error'] = 'Usuario e/ou senha incorretos!';
                return $message;
            }

            $info = auth()->user();
            $info['avatar'] = url('media/avatars/'.$info['avatar']);
            $message['success'] = true;
            $message['data'] = $info;
            $message['token'] = $token;

            return $message;
        }

        // endpoint = http://127.0.0.1:8000/api/auth/logout
        public function logout(){
            auth()->logout();
            return ['success' => true];
        }

        // endpoint = http://127.0.0.1:8000/api/auth/refresh
        public function refresh() {

            $message['success'] = false;
            
            $token = auth()->refresh();

            $info = auth()->user();
            $info['avatar'] = url('media/avatars/'.$info['avatar']);
            $message['success'] = true;
            $message['data'] = $info;
            $message['token'] = $token;

            return $message;
        }


        public function unauthorized(){
            return response()->json([
                'error' => 'Não autorizado.'
            ], 401);
        }
}
