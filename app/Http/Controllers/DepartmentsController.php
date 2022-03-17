<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{

    /**
     * GET
     * PATH api/department
     */
    public function index()
    {
        $department = Department::all();
        return $department;
    }


    /**
     * POST
     * PATH api/department
     * BODY { name, shortName}
     */
    public function store(Request $request)
    {
        $department = new Department;
        $department->name = $request->name;
        $department->shortName = $request->shortName;
        $result = $department->save();

        if($result){
            return ["status"=>"created"];
        }
        return ["status"=>"failed"];
    }

    /**
     * GET
     * PATH api/department/:id
     */
    public function show($id)
    {
        $department = Department::find($id);
        return $department;  
    }

    /**
     * PUT
     * PATH api/department/:id
     * BODY { name, shortName }
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        if (!$department) 
            return ["status"=>"failed"];
        
        $department->name = $request->name;
        $department->shortName = $request->shortName;
        $department->save();
     
        return ["status"=>"updated"];
    }

    /**
     * DELETE
     * PATH api/department/:id
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if(!$department){
            return ["status"=>"failed"];
        }

        $department->delete();

        return ["status"=>"deleted"];
    }
}
