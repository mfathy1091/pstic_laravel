<?php 

namespace App\Repositories\Elequent;

use App\Repositories\EmployeeRepositoryInterface;

use App\Models\Employee;

class EmployeeRepository implements EmployeeRepositoryInterface
{
	public function getAll(){
		return Employee::all();
	}

	public function getEmployee($id){
		return Employee::findOrFail($id);
	}

	public function isSupervisor(Employee $id){
        $employee = Employee::find($id);
        
        $supervisors = Employee::distinct('supervisor_id')
            ->get();

        $supervisors->contains(function ($value, $key) {
            return True;
        });
    }

}