<?php namespace App\Repositories;

interface PsWorkerRepositoryInterface{
	
	public function getAllPsWorkers();

	public function getPsWorker($id);

	public function getAllPsTeams();

	public function getAllGenders();

	public function getAllNationalities();

	public function storePsWorker($request);

}



