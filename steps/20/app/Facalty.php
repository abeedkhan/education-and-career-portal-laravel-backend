<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facalty extends Model
{

    public function varsities(){
        return $this->belongsToMany(Varsity::class);
    }
    public function facaltyDetails(){
        return $this->hasMany(FacaltyDetail::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
    protected $hidden = ['pivot'];
}
