<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $teacher = Teacher::join('users','users.id','=','teachers.user_id')->orderBy('users.fullname','ASC')->get();

        $response = [
            'message'=>'List Teacher completed',
            'data' => $teacher
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
            'user_id' => 'required',
            'birthday' => 'required',
            'birthplace' => 'required',
            'gender' => 'required',
            'salary' => 'required',
            'photo' => 'required',
            'status' => 'required'
        ]);

        
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $teacher = Teacher::create([
            'user_id' => $request->user_id,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'photo' => $request->photo,
            'status' => $request->status
        ]);
        
        $response = [
            'message' => 'Teacher created',
            'data' => $teacher
        ];
        
        return response()->json($response,201);
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
        //update data
        $validator = Validator::make($request->all(), [
            'birthday' => 'required',
            'birthplace' => 'required',
            'gender' => 'required',
            'salary' => 'required',
            'photo' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $teacher = Teacher::find($id);
        if(!$teacher){
            $response = [
                'message'=>'User not found',
                'data' => $teacher
            ];
            return response()->json($response,404);
        }
        $teacher->update([
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'photo' => $request->photo,
            'status' => $request->status
        ]);
        $response = [
            'message' => 'Teacher updated',
            'data' => $teacher
        ];
        
        return response()->json($response,201);
    }

    public function show($id)
    {
        $teacher = Teacher::join('users','users.id','=','teachers.user_id')->where('teachers.id',$id)->get();
        if(!$teacher){
            $response = [
                'message'=>'Teacher not found',
                'data' => $teacher
            ];
            return response()->json($response,404);
        }
        $response = [
            'message'=>'Teacher found',
            'data' => $teacher
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
        $teacher = Teacher::find($id);
        if(!$teacher){
            $response = [
            'message'=>'User not found',
            'data' => $teacher
            ];
            
            return response()->json($response,404);
        }
        $teacher->delete();
        $response = [
            'message'=>'User deleted',
            'data' => $teacher
        ];
        
        return response()->json($response,200);
    }
}
