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

    public function currentPssStatus()
    {
        return $this->belongsTo(PssStatus::class, 'current_pss_status_id');
    }

    public function assignedPsw()
    {
        return $this->belongsTo(Employee::class, 'assigned_psw_id');
    }

    public function directBeneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'direct_beneficiary_id');
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


    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }




    public function currentStatus()
    {
        $status = PssCaseActivity::with('caseStatus', 'month')
        ->where('month_id', date('n'))
        ->get()
        ->map(function ($psCaseActivity){
            return[
                'currentStatus' => $psCaseActivity->caseStatus->name,
                'currentMonth' => $psCaseActivity->month->name,
            ];
        });

        return $status[0]['currentStatus'];
    }


    public function user_referrals()
    {
        return $this->hasMany(Referral::class)->where('user_id', auth()->id());
    }



    public function pssCaseActivities()
    {
        return $this->hasMany(PssCaseActivity::class)->orderBy('month_id', 'DESC');
    }

    public function pssCaseBeneficiaries()
    {
        return $this->hasMany(PssCaseBeneficiary::class)->orderBy('is_direct', 'DESC');
    }


    public function pssCaseActivitiesByMonth($month)
    {
        return $this->hasMany(PssCaseActivity::class)
            ->where('month', $month);
    }



    public function pssCaseActivitiesByMonthlyStatus($month, $status)
    {
        return $this->hasMany(PssCaseActivity::class)
            ->where('month', $month)
            ->where('pss_status_id', $status);
    }















    public function scopeUserPssCases($query)
    {
        $worker = Auth::user()->employee;

        $pssCases = PssCase::where('assigned_psw_id', $worker->id)
            ->get();
    }









}