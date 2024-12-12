<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommunityController;

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

    public function register(Request $request) {
        $data["sys"] ="User System";
        $account = "User Sytem";
        $validator = Validator::make($request->all(),[
            'username' =>'required|string',
            'password' => 'required|string',
            'email'=>'string',
            'user_type_id'=>'required|int'
        ]);
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator,
             ],403);
        } 
        $field = $validator->validated();
        $user = User::updateOrCreate([
            'username'    =>   $field['username'],
            'password'    =>   Hash::make($field['password']),
            'email'       =>   $field['email']??"",
            'user_type_id'=>   $field['user_type_id']
        ]);
        $token = $user->createToken('token')->plainTextToken;
        //community
        if($field['user_type_id'] == 2){
            $request->merge(['user_id' => $user->id]);
            $data = (new CommunityController())->store($request);
            if($data['error'] != ""){
                User::destroy($user->id);
                return response()->json([
                    "message"=> $data['error']
                ],422);
            } 
            $account =  "Compte Bailleur";
        }
        //user_system
        else{
            return response()->json([
                'user' => $user,
                'token'=> $token,
                'account' => $account
             ],200);
        } 
        return response()->json([
           'message' =>'Votre compte a été créer avec succès',
           'data' => $data['sys'],
           'user' => $user,
           'token'=> $token,
           'account' => $account
        ],200);
    }
}
