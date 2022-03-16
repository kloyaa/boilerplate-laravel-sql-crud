<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YearLevelApi;

class YearLevelApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = YearLevelApi::all();
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
        $post = new YearLevelApi;
        $post->yrLvl_Id = $request->yrLvl_Id;
        $post->yrLvl_name = $request->yrLvl_name;
        $post->yrLvl_number = $request->yrLvl_number;
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
        $result = YearLevelApi::find($id);
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
        $post = YearLevelApi::find($id);
         $post->yrLvl_Id = $request->yrLvl_Id;
        $post->yrLvl_name = $request->yrLvl_name;
        $post->yrLvl_number = $request->yrLvl_number;
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
        $post = YearLevelApi::find($id);
        $result = $post->delete();
        if($result){
            return ["result"=>"Post is deleted"];
        }else{
            return ["result"=>"Post Not deleted"];
        }
    }
}
