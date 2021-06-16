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

    public function members()
    {
        return $this->hasMany(FileMember::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    } 
}
