<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function divisionDetails(){
        return $this->hasMany(DivisionDetail::class);
    }
    public function districts(){
        return $this->hasMany(District::class);
    }
    public function varsities(){
        return $this->hasMany(Varsity::class);
    }
}
