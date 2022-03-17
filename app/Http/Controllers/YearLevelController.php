<?php

namespace App\Http\Controllers;

use App\Models\YearLevel;
use Illuminate\Http\Request;

class YearLevelController extends Controller
{

    /**
     * GET
     * PATH api/yearlevel
     */
    public function index()
    {
        $yearLevel = YearLevel::all();
        return $yearLevel;
    }

    /**
     * POST
     * PATH api/yearlevel
     * BODY { yrLvl_Id, yrLvl_name, yrLvl_number}
     */
    public function store(Request $request)
    {
        $yearLevel = new YearLevel;
        $yearLevel->yrLvl_Id = $request->yrLvl_id;
        $yearLevel->yrLvl_name = $request->yrLvl_name;
        $yearLevel->yrLvl_number = $request->yrLvl_number;

        if($yearLevel){
            $yearLevel->save();
            return ["status"=>"created"];
        }
        return ["status"=>"failed"];
    }

    /**
     * GET
     * PATH api/yearlevel/:id
     */
    public function show($id)
    {
        $yearLevel = YearLevel::find($id);
        return $yearLevel; 
    }

    /**
     * PUT
     * PATH api/yearlevel/:id
     * BODY { yrLvl_id, yrLvl_name, yrLvl_number}
     */
    public function update(Request $request, $id)
    {
        $yearLevel = YearLevel::find($id);
        if (!$yearLevel) 
            return ["status"=>"failed"];

        $yearLevel->yrLvl_id = $request->yrLvl_id;
        $yearLevel->yrLvl_name = $request->yrLvl_name;
        $yearLevel->yrLvl_number = $request->yrLvl_number;
        $yearLevel->save();

        return ["status"=>"updated"];
    }

    /**
     * DELETE
     * PATH api/yearlevel/:id
     */
    public function destroy($id)
    {
        $yearLevel = YearLevel::find($id);
        if(!$yearLevel)
            return ["status"=>"failed"];
        
        $yearLevel->delete();

        return ["status"=>"deleted"];
    }
}
