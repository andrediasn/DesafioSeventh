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
    
            // Verificação
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email',
                'password' => 'required|string|min:8',
            ]);

            if($validator->fails()){
                return $this->sendError('Dados incorretos.', $validator->errors());
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
                    return $this->sendError('Erro.', $validator->errors());
                }

                $info = auth()->user();
                $info['avatar'] = url('media/avatars/'.$info['avatar']);
                $message['user'] = $info;
                $message['token'] = $token;

                return $this->sendResponse($message, 'Cadastro realizado.');

            } else {
                return $this->sendError('Email já cadastrado.');
            }  
        }

        // endpoint = http://127.0.0.1:8000/api/auth/login
        public function login(Request $request) {

            $email = $request->email;
            $password = $request->password;

            $token = auth()->attempt([
                'email' => $email,
                'password' => $password
            ]);
            
            if(!$token) {
                return $this->sendError('Usuário e/ou senha incorretos!');
            }


            $info = auth()->user();
            $info['avatar'] = url('media/avatars/'.$info['avatar']);
            $message['user'] = $info;
            $message['token'] = $token;

            return $message;
            //return $this->sendResponse($message, 'Login confirmado.');
        }

        // endpoint = http://127.0.0.1:8000/api/auth/logout
        public function logout(){
            auth()->logout();
            return response()->json('Logout realizado.', 200);
        }

        // endpoint = http://127.0.0.1:8000/api/auth/refresh
        public function refresh() {

            $message['success'] = false;
            
            $token = auth()->refresh();

            $info = auth()->user();
            $info['avatar'] = url('media/avatars/'.$info['avatar']);
            $message['success'] = true;
            $message['user'] = $info;
            $message['token'] = $token;

            return response()->json($message, 200);
        }


        public function unauthorized(){
            return response()->json([
                'error' => 'Não autorizado.'
            ], 401);
        }

        /**
        * success response method.
        * @return \Illuminate\Http\Response
        */
        public function sendResponse($result, $message){

            $response = [
                'success' => true,
                'data'    => $result,
                'message' => $message,
            ];
            return response()->json($response, 200);
        }

        /**
        * return error response.
        * @return \Illuminate\Http\Response
        */
        public function sendError($error, $errorMessages = [], $code = 404){

            $response = [
                'success' => false,
                'message' => $error,
            ];

            if(!empty($errorMessages)){
                $response['data'] = $errorMessages;
            }

            return response()->json($response, $code);
        }
}
