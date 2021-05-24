<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded=[];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function psWorkers()
    {
        return $this->hasMany(PsWorker::class);
    }
}
