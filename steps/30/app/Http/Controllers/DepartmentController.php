<?php

namespace App\Http\Controllers;

use App\Department;
use App\DepartmentDetail;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with('departmentDetails.language' , 'facalty.facaltyDetails')->get();
        return response()->json($departments);
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
        $rules = [
            'facalty_id'=>'required',
            'language_id'=>'required',
            'department_name'=>'required',
            'department_detail'=>'required'
        ];
        $this->validate($request , $rules);
        $data = $request->all();
        $department = Department::create(['facalty_id' => $data['facalty_id'] ]);
        $data['department_id'] = $department->id;
        $departDetail = DepartmentDetail::create($data);
        return response()->json($departDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $department_detail = $department->where('id' , $department->id)->with('departmentDetails.language' , 'facalty.facaltyDetails')->get();
        return response()->json($department_detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department_detail= $department->where('id' , $department->id)->with('departmentDetails.language')->get();
        DepartmentDetail::where('department_id' , $department->id)->delete();
        $department->delete();
        return response()->json($department_detail);
    }
}
