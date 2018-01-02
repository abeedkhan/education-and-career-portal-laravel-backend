<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VarsityDetail extends Model
{
    protected $fillable = [
        'varsity_id',
        'language_id',
        'varsity_name',
        'study',
        'quality',
        'detail',
        'campus_life',
        'backround_and_history',
        'achievements'
    ];
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function language(){
        return $this->belongsTo(Language::class);
    }
}
