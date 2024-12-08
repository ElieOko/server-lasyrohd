<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function login(Request $request) {

        $validator = Validator::make($request->all(),[
            'username' =>'required|string',
            'password' => 'required|string'
        ]);
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator
             ],402);
        }
        $field = $validator->validated();
        $user = User::where('username',$field['username'])->first() ;
        if(!$user){
            return response()->json([
               'message' => 'Utilisateur non valide'
            ],404);
        }
        if(!Hash::check($field['password'],$user->password)){
            return response()->json([
               'message' => 'Mot de passe incorrecte'
            ],404);
        }
        else{
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
               'message' => 'login success',
               'token' => $token,
               'user' => $user
            ],200);
        }
    }
}
