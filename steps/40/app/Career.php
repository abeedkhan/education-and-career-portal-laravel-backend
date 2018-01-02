<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'item_id'
    ];
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function careerDetails(){
        return $this->hasMany(CareerDetail::class);
    }
}
