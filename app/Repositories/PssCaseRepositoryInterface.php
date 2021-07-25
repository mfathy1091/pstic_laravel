<?php namespace App\Repositories;

interface PssCaseRepositoryInterface{
	
    public function getAllPsCases();

    public function storePsCase($request);

    public function insertDefaultMonthlyStatuses($psCaseID, $referralMonth);

    public function getMonthCaseStatus($psCaseId, $monthId);


}



