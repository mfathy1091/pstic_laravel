<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyRecord extends Model
{
    protected $guarded =[];


    // parent tables
    public function pssCase()
    {
        return $this->belongsTo(PssCase::class, 'pss_case_id');
    }
    

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }


    // child tables
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }






    public function scopeNew($query)
    {
        $query->where('status_id', '1');
    }

    public function scopeMonth($query, $monthId)
    {
        $query->where('month_id', $monthId);
    }

    public function scopeMonths($query, $monthId)
    {
        $query->whereIn('month_id', $monthId);
    }

    public function scopeStatus($query, $statusId)
    {
        $query->where('status_id', $statusId);
    }




}
