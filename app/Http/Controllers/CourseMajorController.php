<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseMajor;

class CourseMajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = CourseMajor::all();
        return $result;
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
        $post = new CourseMajor;
        $post->courseId = $request->courseId;
        $post->majorName = $request->majorName;
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
        $result = CourseMajor::find($id);
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
        $post = CourseMajor::find($id);
        $post->courseId = $request->courseId;
        $post->majorName = $request->majorName;
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
        $post = CourseMajor ::find($id);
        $result = $post->delete();
        if($result){
            return ["result"=>"Post is deleted"];
        }else
            return ["result"=>"Post Not deleted"];
    }
}
