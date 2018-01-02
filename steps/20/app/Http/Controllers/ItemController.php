<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('varsity.varsityDetails' , 'careers.careerDetails' , 'varsity.facalties' , 'varsity.departments' , 'files')->get();
        return response()->json($items);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $item_detail = Item::where('id' , $item->id)
            ->with(
                'varsity.varsityDetails' ,
                'notices' ,
                'varsity.facalties.facaltyDetails' ,
                'varsity.departments.departmentDetails' ,
                'alumnis.alumniDetails' ,
                'careers.careerDetails',
                'files')->get();
        return response()->json($item_detail[0]);
    }
}
