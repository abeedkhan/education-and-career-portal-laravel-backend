<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Item;
use Illuminate\Http\Request;

class ItemNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Item $item)
    {
        $notices = $item->notices;
        return response()->json($notices);
    }
}
