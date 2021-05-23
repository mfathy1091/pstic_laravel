<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gender;

class PsWorker extends Model
{
    protected $guarded=[];

    // parent tables
    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality', 'nationality_id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\PsTeam','team_id');
    }

    public function caseStatus()
    {
        return $this->belongsTo(CaseStatus::class);
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    // child tables
    public function psCases()
    {
        return $this->hasMany(PsCase::class);
    }
}
