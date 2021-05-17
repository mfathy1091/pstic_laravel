<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsCase extends Model
{
    protected $guarded =[];


    public function referralSource()
    {
        return $this->belongsTo(ReferralSource::class);
    }

    public function psWorker()
    {
        return $this->belongsTo(PsWorker::class, 'ps_worker_id');
    }


}
