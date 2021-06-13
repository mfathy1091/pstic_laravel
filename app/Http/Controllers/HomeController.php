<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PsCase;
use App\Models\Employee;
use App\Models\Beneficiary;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$beneficiaries = Beneficiary::direct()->first();
        //dd($beneficiaries);


        $psCase = PsCase::find(1);
        $beneficiaries = $psCase->beneficiaries;
        
        
        $pscases = PsCase::get()
            ->map(function($psCase){
            return [
                'id' => $psCase->id,
                'referral_date' => $psCase->referral_date,
                'file_number' => $psCase->file_number,
                'referral_source' => $psCase->referralSource->name,
                'referring_person_name' => $psCase->referring_person_name,
                'referring_person_name' => $psCase->referring_person_email,
                'referral_source' => $psCase->referral_source_id,
                'case_type_id' => $psCase->caseType->name,
                'case_status' => $psCase->caseStatus->name,
                'is_emergency' => $psCase->referral_source_id,
                'direct_beneficiary_name' => $psCase->beneficiaryDirect()->name,
                'direct_beneficiary_age' => $psCase->beneficiaryDirect()->age,
                'direct_beneficiary_nationality' => $psCase->beneficiaryDirect()->nationality->name,
            ];
	    });



        dd($pscases);


        $role = Role::findById(1);

        $psWorkers = Employee::where('job_title_id', '1')->get()->count();
        //$permission = Permission::create(['name'=>'role-list']);
        //$permission = Permission::findById(1);

        //auth()->user()->givePermissionTo('role-list');
        //auth()->user()->givePermissionTo('role-delete');

        //auth()->user()->revokePermissionTo('role-list');
        //auth()->user()->revokePermissionTo('role-list');


        //auth()->user()->assignRole($role);

        //$permission = Permission::findById(1);
        //$role->givePermissionTo('role-list');
        $role = Role::findById(1);
        //return $role->hasPermissionTo('role-list');
        //return $roles = auth()->user()->getRoleNames();
        //return User::doesntHave('roles')->get();

        //return auth()->user();


        return view('dashboard', compact('psWorkers'));
    }
}
