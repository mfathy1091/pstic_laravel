<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public const PSS_ID = 1;
    public const HOUSING_ID = 2;
    public const Management_ID = 3;
    public const NA_ID = 4;

    public function team(){
        return $this->hasMany(Team::class);
    }

    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
