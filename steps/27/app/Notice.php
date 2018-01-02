<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'item_id',
        'title',
        'file_name'
    ];
    public function item(){
        return $this->belongsTo(Item::class);
    }
}
