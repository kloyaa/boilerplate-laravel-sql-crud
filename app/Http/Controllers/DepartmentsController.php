<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Department::all();
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Department;
        $post->name = $request->name;
        $post->shortName = $request->shortName;
        $result = $post->save();
        if($result){
            return ["result"=>"Post Added"];
        }else{
            return ["result"=>"Post Not Added"];
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Department::find($id);
        return $result;  
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
        $post = Department::find($id);
        $post->name = $request->name;
        $post->shortName = $request->shortName;
        $result = $post->save();
        if ($result) {
            return ["result"=>"Post Updated"];
        } else {
            return ["result"=>"Post Not Updated"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Department::find($id);
        $result = $post->delete();
        if($result){
            return ["result"=>"Post is deleted"];
        }else{
            return ["result"=>"Post Not deleted"];
        }
    }
}
