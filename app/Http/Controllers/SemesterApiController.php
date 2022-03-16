<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemesterApi;

class SemesterApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = SemesterApi::all();
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
        $post = new SemesterApi;
        $post->sem_Id = $request->sem_Id;
        $post->sem_semister = $request->sem_semister;
        $post->sem_status = $request->sem_status;
        $post->sem_numbers = $request->sem_numbers;
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
        $result = SemesterApi::find($id);
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
        $post = SemesterApi::find($id);
        $post->sem_Id = $request->sem_Id;
        $post->sem_semister = $request->sem_semister;
        $post->sem_status = $request->sem_status;
        $post->sem_numbers = $request->sem_numbers;
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
        $post = SemesterApi::find($id);
        $result = $post->delete();
        if($result){
            return ["result"=>"Post is deleted"];
        }else{
            return ["result"=>"Post Not deleted"];
        }
    }
}
