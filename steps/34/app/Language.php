<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function varsityDetails(){
        return $this->hasMany(VarsityDetail::class);
    }
    public function alumniDetails(){
        return $this->hasMany(AlumniDetail::class);
    }
}
