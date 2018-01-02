<?php

namespace App;

use App\Scopes\SellerScope;

class Seller extends User
{
    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new SellerScope());
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}