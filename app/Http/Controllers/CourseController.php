<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * GET
     * PATH api/course
     */
    public function index()
    {
        $course = Course::all();
        return $course;
    }


    /**
     * POST
     * PATH api/course
     * BODY { courseName, shortName, departmentId}
     */
    public function store(Request $request)
    {
        $course = new Course;
        $course->courseName = $request->courseName;
        $course->shortName = $request->shortName;
        $course->departmentId = $request->departmentId;

        if($course){
            $course->save();
            return ["status"=>"created"];
        }
        return ["status"=>"failed"];
    }


    /**
     * GET
     * PATH api/course/:id
     */
    public function show(Course $course)
    {
    
        $course = Course::find($id);
        return $course; 
    }

    /**
     * PUT
     * PATH api/course/:id
     * BODY { courseName, shortName, departmentId}
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        if (!$course) 
            return ["status"=>"failed"];

        $course->courseName = $request->courseName;
        $course->shortName = $request->shortName;
        $course->departmentId = $request->departmentId;
        $course->save();

        return ["status"=>"updated"];
    }

    /**
     * DELETE
     * PATH api/course/:id
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if(!$course)
            return ["status"=>"failed"];

        $course->delete();

        return ["status"=>"deleted"];
    }
}
