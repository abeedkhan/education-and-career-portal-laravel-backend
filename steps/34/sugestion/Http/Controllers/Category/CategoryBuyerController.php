<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryBuyerController extends ApiController
{

    public function index(Category $category)
    {
        $buyers = $category
            ->product()
            ->has('transaction')
            ->with('transaction.buyer')
            ->get()
            ->pluck('transaction')
            ->collapse()
            ->pluck('buyer')
            ->unique('id')
            ->values();
        return $this->showAll($buyers);
    }
}
