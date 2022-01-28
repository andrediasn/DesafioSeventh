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
            $this->middleware('auth:api', ['except' => ['create', 'login']]);
        }
        
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
    
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
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
                $message['success'] = true;
                $message['data'] = $info;
                $message['token'] = $token;


            } else {
                $message['error'] = 'E-mail já cadastrado!';
                return $message;
            }

            
            return $message;
        }
}
