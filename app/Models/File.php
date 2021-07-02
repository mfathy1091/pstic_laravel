<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['number', 'created_user_id'];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function individuals()
    {
        return $this->hasMany(Individual::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function pssCases()
    {
        return $this->hasMany(PssCase::class);
    } 
}
