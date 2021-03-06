<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'phone_number', 'email', 'roll', 'reg_id', 'department_id',
    'classes_id','father_name', 'mother_name', 'present_address', 'permanent_address', 'home_number','image' ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class);
    }

}
