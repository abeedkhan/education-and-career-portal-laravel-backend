<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::with('divisionDetails.language' , 'districts.districtDetails.language')
            ->get();
        return response()->json(
            $divisions
            , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        $div = $division->where('id', $division->id)->with('divisionDetails.language')->get();
        return response()->json(
            $div
            , 200);
    }

}
