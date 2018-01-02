<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacaltyDetail extends Model
{
    protected $fillable = [
        'facalty_id',
        'language_id',
        'facalty_name',
        'facalty_detail'
    ];
    public function facalty(){
        return $this->belongsTo(Facalty::class);
    }
    public function language(){
        return $this->belongsTo(Language::class);
    }
}
