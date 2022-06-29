<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }
        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            $user = Auth::user();
            dd($user);
        }else{
            return $this->responseError('Username or password is incorrect',401);
        }
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    

}
