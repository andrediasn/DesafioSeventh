<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



class UserController extends Controller
{
    private $loggedUser;

    public function __construct() {
        $this->middleware('auth:api');
        $this->loggedUser = auth()->user();
    }

    public function read() {
        $message['success'] = false;

        $info = $this->loggedUser;
        if($info){
            $message['success'] = true;
            $info['avatar'] = url('media/avatars/'.$info['avatar']);
            $message['data'] = $info;
        }

        return $message;
    }

    public function list(Request $request) {

        $users = User::all();

        foreach($users as $key => $value){
            $users[$key]['avatar'] = url('media/avatars/'.$users[$key]['avatar']);
        }

        $message['data'] = $users;

        return $message;
    }

    public function one($id){
        
        $user = User::find($id);
        
        if($user){
            $message['success'] = true;
            $user['avatar'] = url('media/avatars/'.$user['avatar']);
            $message['data'] = $user;
        }
        else{
            $message['success'] = false;
            $message['message'] = 'Usuário não existe.';
        }

        return $message;
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'min:2',
            'email' => 'email|unique:users',
            'password' => 'same:password_confirm',
            'password_confirm' => 'same:password'
        ]);

        if($validator->fails()) {
            return response()->json(['success'=>false, 'message'=>$validator->errors()->all()]);
        }

        $user = User::find($this->loggedUser->id);

        if($request->name){
            $user->name = $request->name;
        }
        if($request->email){
            $user->email = $request->email;
        }
        if($request->password){
            $user->password = Hash::make($request->$password);
        }

        if($user->save()){
            $message['success'] = true;
            $message['message'] = 'Dados atualizados.';
        }

        echo json_encode($message);
    }

    public function updateAvatar(Request $request){

        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        if($validator->fails()) {
            return response()->json(['success'=>false, 'message'=>$validator->errors()->all()]);
        }

        $avatar = $request->file('avatar');

        $dest = public_path('/media/avatars');
        $avatarName = md5(time().rand(0,9999)).'.jpg';

        $img = Image::make($avatar->getRealPath());
        $img->fit(300,300)->save($dest.'/'.$avatarName);

        $user = User::find($this->loggedUser->id);
        $user->avatar = $avatarName;

        if($user->save()){
            $message['success'] = true;
            $message['message'] = 'Avatar atualizado.';
        }

        echo json_encode($message);

    }

}

