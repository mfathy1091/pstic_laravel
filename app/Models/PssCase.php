<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PssCase extends Model
{

    protected $guarded =[];

    // parent tables

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }

    public function referral()
    {
        return $this->belongsTo(Referral::class, 'referral_id');
    }

    public function currentStatus()
    {
        return $this->belongsTo(Status::class, 'current_status_id');
    }

    public function assignedPsw()
    {
        return $this->belongsTo(User::class, 'assigned_psw_id');
    }

    public function directIndividual()
    {
        return $this->belongsTo(Individual::class, 'direct_individual_id');
    }



    // child tables
/*     public function directBeneficiary()
    {
        return $this->hasOne(Beneficiary::class)->direct();;
    }
 */
    public function beneficiariesIndirect()
    {
        return $this->hasMany(Beneficiary::class)->indirect();
        // or this way:
        // return $this->posts()->published();
    }


    public function visits()
    {
        return $this->hasMany(Visit::class);
    }




    public function currentStatus2()
    {
        $status = Record::with('caseStatus', 'month')
        ->where('month_id', date('n'))
        ->get()
        ->map(function ($record){
            return[
                'currentStatus' => $record->caseStatus->name,
                'currentMonth' => $record->month->name,
            ];
        });

        return $status[0]['currentStatus'];
    }


    public function user_referrals()
    {
        return $this->hasMany(Referral::class)->where('user_id', auth()->id());
    }



    public function records()
    {
        return $this->hasMany(Record::class)->orderBy('month_id', 'DESC');
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class)->orderBy('is_direct', 'DESC');
    }


    public function recordsByMonth($month)
    {
        return $this->hasMany(Record::class)
            ->where('month', $month);
    }



    public function recordsByMonthlyStatus($month, $status)
    {
        return $this->hasMany(Record::class)
            ->where('month', $month)
            ->where('status_id', $status);
    }















    public function scopeUserPssCases($query)
    {
        $worker = Auth::user()->employee;

        $pssCases = PssCase::where('assigned_psw_id', $worker->id)
            ->get();
    }









}