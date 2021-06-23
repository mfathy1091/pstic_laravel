<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarderd = [];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    } 
}
