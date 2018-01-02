<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'item_id',
        'name',
        'file_type_id'
    ];
    public function item(){
        return $this->belongsTo(Item::class);
    }
}
