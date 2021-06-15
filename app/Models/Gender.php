<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public const MALE = 1;
    public const FEMALE = 2;



    protected $fillable =['name'];
}
