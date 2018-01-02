<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['item_type_id'];
    public function varsity(){
        return $this->hasMany(Varsity::class);
    }
    public function careers(){
        return $this->hasMany(Career::class);
    }
    public function alumnis(){
        return $this->hasMany(Alumni::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
    public function notices(){
        return $this->hasMany(Notice::class);
    }
}
