<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYear;

class SchoolYearController extends Controller
{

    /**
     * GET
     * PATH api/schoolyear
     */
    public function index()
    {
        $result = SchoolYear::all();
        return $result;
    }

    /**
     * POST
     * PATH api/schoolyear
     * BODY { sy_name, sy_status }
     */
    public function store(Request $request)
    {
        $schoolYear = new SchoolYear;
        $schoolYear->sy_name = $request->sy_name;
        $schoolYear->sy_status = $request->sy_status;

        if($schoolYear){
            $schoolYear->save();
            return ["status"=>"created"];
        }
        return ["status"=>"failed"];
    }


    /**
     * GET
     * PATH api/schoolyear/:id
     */
    public function show($id)
    {
        $schoolYear = SchoolYear::find($id);
        return $schoolYear;  
    }

    /**
     * PUT
     * PATH api/schoolyear/:id
     * BODY { sem_id, sem_semester, sem_status, sem_numbers}
     */
    public function update(Request $request, $id)
    {
        $schoolYear = SchoolYear::find($id);
        if (!$schoolYear) 
            return ["status"=>"failed"];
        
        $schoolYear->sy_name = $request->sy_name;
        $schoolYear->sy_status = $request->sy_status;
        $schoolYear->save();

        return ["status"=>"updated"];
    }

    /**
     * DELETE
     * PATH api/schoolyear/:id
     */
    public function destroy($id)
    {
        $schoolYear = SchoolYear::find($id);
        if(!$schoolYear)
            return ["status"=>"failed"];
                   
        $schoolYear->delete();

        return ["status"=>"deleted"];
    }
}
