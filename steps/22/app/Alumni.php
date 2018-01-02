<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = ['item_id'];
    public function item() {
        return $this->belongsTo(Item::class);
    }
    public function alumniDetails(){
        return $this->hasMany(AlumniDetail::class);
    }

}
