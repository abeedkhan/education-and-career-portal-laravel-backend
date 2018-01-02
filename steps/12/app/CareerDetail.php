<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerDetail extends Model
{
    protected $fillable = [
        'career_id',
        'language_id',
        'career_title',
        'career_description',
        'instructions'
    ];
}
