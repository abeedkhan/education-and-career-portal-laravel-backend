<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumniDetail extends Model
{
    protected $fillable = [
        'alumni_id',
        'language_id',
        'alumni_name',
        'alumni_image',
        'about'
    ];
    public function alumni(){
        return $this->belongsTo(Alumni::class);
    }
}
