<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = District::with('districtDetails.language')->get();
        return response()->json(
            $district
            , 200);
    }

    public function show(District $district)
    {
        $dist = $district
                    ->where('id', $district->id)
                    ->with('districtDetails.language')
                    ->with('division.divisionDetails')
                    ->get();
        return response()->json(
            $dist
            , 200);
    }
}
