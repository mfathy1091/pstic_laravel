<?php namespace App\Repositories;

interface PsCaseRepositoryInterface{
	
    public function getMonthCaseStatus($psCaseId, $monthId);

    public function storePsCase($request);

    public function getAll();

}



