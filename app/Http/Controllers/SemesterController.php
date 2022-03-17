<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * GET
     * PATH api/semester
     */
    public function index()
    {
        $result = Semester::all();
        return $result;
    }

    /**
     * POST
     * PATH api/semester
     * BODY { sem_id, sem_semester, sem_status, sem_numbers}
     */
    public function store(Request $request)
    {
        $semester = new Semester;
        $semester->sem_id = $request->sem_id;
        $semester->sem_semester = $request->sem_semester;
        $semester->sem_status = $request->sem_status;
        $semester->sem_numbers = $request->sem_numbers;
        
        if($semester) {
            $semester->save();
            return ["status"=>"created"];
        }
        return ["status"=>"failed"];
    }

    /**
     * GET
     * PATH api/semester/:id
     */
    public function show($id)
    {
        $semester = Semester::find($id);
        return $semester;
    }

    /**
     * PUT
     * PATH api/semester/:id
     * BODY { sem_id, sem_semester, sem_status, sem_numbers}
     */
    public function update(Request $request, $id)
    {
        $semester = Semester::find($id);
        if (!$semester) 
            return ["status"=>"failed"];
        
        $semester->sem_id = $request->sem_id;
        $semester->sem_semester = $request->sem_semester;
        $semester->sem_status = $request->sem_status;
        $semester->sem_numbers = $request->sem_numbers;
        $semester->save();

        return ["status"=>"updated"];
    }

    /**
     * DELETE
     * PATH api/semester/:id
     */
    public function destroy($id)
    {

        $semester = Semester::find($id);
        if(!$semester)
            return ["status"=>"failed"];
        
        $semester->delete();

        return ["status"=>"deleted"];
    }
}
