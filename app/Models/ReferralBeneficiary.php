<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralBeneficiary extends Model
{
    use HasFactory;

    

    public function type()
    {
        return $this->belongsTo(BeneficiaryType::class, 'beneficiary_type_id');
    }
}
