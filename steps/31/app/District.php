<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'division_id'
    ];
    public function division(){
        return $this->belongsTo(Division::class);
    }
    public function districtDetails(){
        return $this->hasMany(DistrictDetail::class);
    }
    public function varsities(){
        return $this->hasMany(Varsity::class);
    }
}
