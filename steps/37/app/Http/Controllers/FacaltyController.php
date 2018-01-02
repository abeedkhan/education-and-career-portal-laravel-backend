<?php

namespace App\Http\Controllers;

use App\Facalty;
use App\FacaltyDetail;
use Illuminate\Http\Request;

class FacaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facaties = Facalty::with('facaltyDetails.language' , 'departments.departmentDetails')->get();
        return response()->json($facaties);
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
            'language_id'=>"required",
            'facalty_name'=>"required",
            'facalty_detail'=>"required"
        ];
        $this->validate($request , $rules);
        $facalty = Facalty::create();
        $data= $request->all();
        $data['facalty_id'] = $facalty->id;
        $facalty_detail = FacaltyDetail::create($data);
        return response()->json($facalty_detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facalty  $facalty
     * @return \Illuminate\Http\Response
     */
    public function show(Facalty $facalty)
    {
        $facalty_detail= $facalty->where('id' , $facalty->id)->with('facaltyDetails.language')->get();
        return response()->json($facalty_detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facalty  $facalty
     * @return \Illuminate\Http\Response
     */
    public function edit(Facalty $facalty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facalty  $facalty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facalty $facalty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facalty  $facalty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facalty $facalty)
    {
        $facalty_detail= $facalty->where('id' , $facalty->id)->with('facaltyDetails.language')->get();
        FacaltyDetail::where('facalty_id' , $facalty->id)->delete();
        $facalty->delete();
        return response()->json($facalty_detail);
    }
}
