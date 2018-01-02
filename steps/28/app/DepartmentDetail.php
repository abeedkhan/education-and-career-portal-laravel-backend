<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentDetail extends Model
{
    protected $fillable =[
        'department_id',
        'language_id',
        'department_name',
        'department_detail'
    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function language(){
        return $this->belongsTo(Language::class);
    }
}
