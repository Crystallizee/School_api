<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('fullname','ASC')->get();

        $response = [
            'message'=>'List User completed',
            'data' => $user
        ];

        return response()->json($response,200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store data
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required|unique:users|min:3|max:10',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        
        $response = [
            'message' => 'User created',
            'data' => $user
        ];
        
        return response()->json($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            $response = [
                'message'=>'User not found',
                'data' => $user
            ];
            return response()->json($response,404);
        }
        $response = [
            'message'=>'User found',
            'data' => $user
        ];
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update data
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required|min:3|max:10',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $user = User::find($id);
        if(!$user){
            $response = [
                'message'=>'User not found',
                'data' => $user
            ];
            return response()->json($response,404);
        }
        $user->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        
        $response = [
            'message' => 'User updated',
            'data' => $user
        ];
        
        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete user
        $user = User::find($id);
        if(!$user){
            $response = [
            'message'=>'User not found',
            'data' => $user
            ];
            
            return response()->json($response,404);
        }
        $user->delete();
        $response = [
            'message'=>'User deleted',
            'data' => $user
        ];
        
        return response()->json($response,200);
    }
}
