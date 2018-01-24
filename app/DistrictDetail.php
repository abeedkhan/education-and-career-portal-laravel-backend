<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictDetail extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'district_id',
        'language_id',
        'district_name'
    ];
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function language(){
        return $this->belongsTo(Language::class);
    }
}
