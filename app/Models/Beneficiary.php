<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    public function individual()
    {
        return $this->belongsTo(Individual::class, 'individual_id');
    }
}
