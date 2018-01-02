<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'facalty_id'
    ];
    public function varsities(){
        return $this->belongsToMany(Varsity::class);
    }
    public function departmentDetails(){
        return $this->hasMany(DepartmentDetail::class);
    }
    public function facalty(){
        return $this->belongsTo(Facalty::class);
    }
    protected $hidden = ['pivot'];
}
