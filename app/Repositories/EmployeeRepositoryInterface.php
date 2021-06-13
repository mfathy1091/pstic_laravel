<?php namespace App\Repositories;

use App\Models\Employee;

interface EmployeeRepositoryInterface{
	
	public function getAll();

	public function getEmployee($id);

	public function isSupervisor(Employee $id);
}