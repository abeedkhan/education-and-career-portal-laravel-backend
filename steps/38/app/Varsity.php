<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Varsity extends Model
{
    protected $fillable = [
    'item_id',
    'location',
    'number_of_student',
    'number_of_professor',
    'number_of_assistance_professor',
    'number_of_lecturer',
    'division_id',
    'district_id'
    ];
    public function varsityDetails(){
        return $this->hasMany(VarsityDetail::class);
    }
    public function alumnis(){
        return $this->hasMany(Alumni::class);
    }
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function division(){
        return $this->belongsTo(Division::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function facalties(){
        return $this->belongsToMany(Facalty::class);
    }
    public function departments(){
        return $this->belongsToMany(Department::class);
    }
}
