<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionDetail extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function Division(){
        return $this->belongsTo(Division::class);
    }
    public function language(){
        return $this->belongsTo(Language::class);
    }
}
