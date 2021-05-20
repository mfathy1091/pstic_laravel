<?php namespace App\Repositories;

interface PsCaseRepositoryInterface{
	
    public function getAllPsCases();

    public function storePsCase($request);

    public function insertDefaultMonthlyStatuses($psCaseID, $referralMonth);

    public function getMonthCaseStatus($psCaseId, $monthId);


}



