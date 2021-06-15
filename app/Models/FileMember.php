<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileMember extends Model
{
    use HasFactory;

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
