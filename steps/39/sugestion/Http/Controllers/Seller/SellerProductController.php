<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Product;
use App\Seller;
use App\User;
use Http\Client\Exception\HttpException;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $products = $seller->product;
        return $this->showAll($products);
    }
    public function store(Request $request ,User $seller)
    {
        $rules = [
            'name'=>'required | min:3',
            'description'=>'required',
            'quantity'=>'required | integer | min:1',
            'image'=>'required | image',
        ];
        $this->validate($request , $rules);
        $data = $request->all();
        $data['status'] = Product::UNAVAILABLE_PRODUCT;
        $data['image'] = '1.jpg';
        $data['seller_id'] = $seller->id;
        $product =Product::create($data);
        return $this->showOne($product);
    }
    public function update(Request $request , Seller $seller , Product $product){
        $rules = [
            'quantity'=>'integer | min:1',
            'status'=>'in:', Product::AVAILABLE_PRODUCT . ',' . Product::UNAVAILABLE_PRODUCT,
            'image' => 'image',
        ];
        $this->validate($request , $rules);
        $this->checkSeller($seller , $product);
        $product->fill(array_filter($request->only(
            'name',
            'description',
            'quantity'
        )));
        if($request->has('status')){
            $product->status = $request->status;
            if($product->isAvailable() && $product->category()->count() ==0){
               return $this->errorResponse('at least 1 category needed' , 409);
            }
        }
        if($product->isClean()){
            return $this->errorResponse('No value change' , 422);
        }
        $product->save();
        return $this->showOne($product);
    }
    public function destroy(Seller $seller , Product $product){
        $this->checkSeller($seller , $product);
        $product->delete();
        return $this->showOne($product);
    }

    public function checkSeller(Seller $seller , Product $product){
        if($seller->id != $product->seller_id){
            throw new HttpException(422 , 'Seller and product Does not match');
        }
    }

}
