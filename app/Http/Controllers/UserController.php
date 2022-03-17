<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::all();
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->userName = $request->userName;
        $user->password = $request->password;
        $user->fullName = $request->fullName;
        $user->courseId = $request->courseId;
        $user->userLevel = $request->userLevel;

        if($user){
            $user->save();
            return ["result"=>"created"];
        }
        return ["result"=>"failed"]; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($id);
        return $user;  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) 
            return ["result"=>"failed"];
        
        $user->userName = $request->userName;
        $user->password = $request->password;
        $user->fullName = $request->fullName;
        $user->courseId = $request->courseId;
        $user->userLevel = $request->userLevel;
        $user->save();
        
        return ["result"=>"updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user)
            return ["status"=>"failed"];
        
        $user->delete();
      
        return ["status"=>"deleted"];
    }
}
