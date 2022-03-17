<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseMajor;

class CourseMajorController extends Controller
{

    /**
     * GET
     * PATH api/courseMajor
     */
    public function index()
    {
        $courseMajor = CourseMajor::all();
        return $courseMajor;
    }

    /**
     * POST
     * PATH api/courseMajor
     * BODY { majorId, courseId, majorName}
     */
    public function store(Request $request)
    {
        $courseMajor = new CourseMajor;
        $courseMajor->majorId = $request->majorId;
        $courseMajor->courseId = $request->courseId;
        $courseMajor->majorName = $request->majorName;

        if($courseMajor){
            $courseMajor->save();
            return ["status"=>"created"];
        }
        return ["status"=>"failed"];
    }

    /**
     * GET
     * PATH api/coursemajor/:id
     */
    public function show($id)
    {
        $courseMajor = CourseMajor::find($id);
        return $courseMajor;
    }

    /**
     * PUT
     * PATH api/coursemajor/:id
     * BODY { majorId, courseId, majorName}
     */
    public function update(Request $request, $id)
    {
        $courseMajor = CourseMajor::find($id);
        if(!$courseMajor) 
            return ["status"=>"failed"];
        
        $courseMajor->majorId = $request->majorId;
        $courseMajor->courseId = $request->courseId;
        $courseMajor->majorName = $request->majorName;
        $courseMajor->save();

        return ["status"=>"updated"];
    }

    /**
     * DELETE
     * PATH api/coursemajor/:id
     */
    public function destroy($id)
    {
        $courseMajor = CourseMajor ::find($id);
        if(!$courseMajor)
            return ["status"=>"failed"];
           
        $courseMajor->delete();

        return ["status"=>"deleted"];
    }
}
