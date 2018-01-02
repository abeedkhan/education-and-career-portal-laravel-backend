<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchSuggestionController extends Controller
{
    public function index(){
        $varsities = DB::table('varsity_details')->select('varsity_name as string')->get();
        $items = [];
        foreach ($varsities as $varsity){
            $varsity->type="varsity";
            $items[]=$varsity;
        }
        return response()->json($items);
    }
}
