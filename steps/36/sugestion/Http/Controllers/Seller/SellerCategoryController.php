<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $categories =  $seller->product()
                ->whereHas('category')
                ->with('category')
                ->get()
                ->pluck('category')
                ->unique('id')
                ->values()
                ->collapse();
        return $this->showAll($categories);
    }
}
